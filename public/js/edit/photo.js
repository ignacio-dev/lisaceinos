(function editPhotoScope() {
	var saveBtn   = document.getElementById("saveBtn");
	var photosDOM = document.querySelectorAll("#photo li");
	var photosToUpload = new FormData();
	
	var overlay = document.createElement("div");
	overlay.id = "overlay";
	overlay.classList.add("invisible");
	document.body.appendChild(overlay);

	// Choose & Preview Photos
	for (var i = 0; i < photosDOM.length; i++) {
		photosDOM[i].querySelector(".chooseFileBtn").onchange = previewPhoto;
	}

	function previewPhoto() {
		var imgBox = this.parentElement.parentElement.querySelector("figure");
		// var index  = parseInt(this.id.charAt(this.id.length -1)) -1;
		var _this   = this;
		var reader = new FileReader();

		reader.onload = function() {
			imgBox.style.backgroundImage = "url('" + reader.result + "')";
			imgBox.setAttribute("data-updated", "true");
			photosToUpload.append(_this.name, _this.files[0]);

		};
		reader.readAsDataURL(event.target.files[0]);

		// Reset Save Btn
		if (saveBtn.innerHTML != "<i class='far fa-save'></i> save") {
			saveBtn.innerHTML  = "<i class='far fa-save'></i> save";
			saveBtn.classList.remove("active");
			saveBtn.onclick = uploadPhotos;
		}
	}

	// Upload & Save Changes
	saveBtn.onclick = uploadPhotos;

	function uploadPhotos() {
		var xhr = new XMLHttpRequest();
		xhr.open("POST", "http://www.juryofficial.com/lisaceinos/edit/update_photo", true);
		xhr.upload.onprogress = function() {
			overlay.classList.remove("invisible");
			overlay.classList.add("visible");
			saveBtn.innerHTML = "saving...";
		};
		xhr.onload = function() {
			if (this.status == 200) {
				overlay.classList.remove("visible");
				overlay.classList.add("invisible");
				saveBtn.onclick   = null;
				saveBtn.classList.add("active");
				saveBtn.innerHTML = "<i class='fas fa-check success'></i> saved!";
				// Reset ImgBox Src And Data-Updated If Updated
				for (var j = 0; j < photosDOM.length; j++) {
					(function() {
						var imgBox = photosDOM[j].querySelector("figure");
						if (imgBox.getAttribute("data-updated") == "true") {
							imgBox.style.backgroundImage = "url(http://www.juryofficial.com/lisaceinos/public/img/photo/photo" + (j+1) + ".jpg?" + Date.now() + ")";
							imgBox.setAttribute("data-updated", "false");;

						}
					})();
				}
				// Clear Photos To Upload
				photosToUpload = new FormData();
			}
			else {
				saveBtn.innerHTML = "Something went wrong :(";
			}
		}
		xhr.send(photosToUpload);
	}
})();