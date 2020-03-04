(function editAboutScope() {
	// Elements
	var saveBtn     = document.getElementById("saveBtn");
	var bioHolder   = document.getElementById("bioHolder");
	var elemsToBlur = [
		document.querySelector("main"),
		document.querySelector("header"),
		document.querySelector("html"),
		document.querySelector("body")
	];

	// Colors
	var almostWhite = "#FCFAFA";
	var lightGrey   = "#D3D3D3";
	var lighterGrey = "#F2F2F2";

	// Blur Items To Color
	function blur(color, array = elemsToBlur) {
		for (var i in array) {
			array[i].style.backgroundColor = color;
		}
	}

	// Functionality
	saveBtn.onclick = function() {
		saveBio(bioHolder.innerText.trim());
	};

	bioHolder.onmouseenter = function() {
		blur(lighterGrey);
	}

	bioHolder.onmouseleave = function() {
		blur(almostWhite);
	}
	
	bioHolder.onfocus = function() {
		blur(lightGrey);

		this.classList.remove("preview");
		this.onchange = function() {
			// Reset Save Button
			if (saveBtn.innerHTML != "<i class='far fa-save'></i> save") {
				saveBtn.innerHTML  = "<i class='far fa-save'></i> save";
				saveBtn.classList.remove("active");
				saveBtn.onclick = function() {
					saveBio(bioHolder.innerText.trim());		
				}
			}
		};

		// Temporarily Unset Modal Hovers
		this.onmouseenter = null;
		this.onmouseleave = null;
	};

	bioHolder.onblur = function() {
		blur(almostWhite);
		
		this.classList.add("preview");
		this.innerText = this.innerText.trim();

		// Set Modal Hovers Back
		this.onmouseenter = function() {
			blur(lighterGrey);
		}
		this.onmouseleave = function() {
			blur(almostWhite);
		}
	};

	// AJAX
	function saveBio(bio) {
		var params = "bio=" + bio;
		var xhr = new XMLHttpRequest();
		xhr.open("POST", window.location.href, true);
		xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhr.onprogress = function() {
			saveBtn.innerHTML = "saving...";
		};
		xhr.onload = function() {
			switch(this.status) {
				case 200:
					bioHolder.innerHTML  = xhr.responseText;
					// Unset Save Button Until New Changes
					saveBtn.onclick      = null;
					saveBtn.classList.add("active");
					saveBtn.innerHTML    = "<i class='fas fa-check success'></i> saved!";
					break;

				case 403:
					bioHolder.innerHTML  = "ERROR: You don't have permission to access this databse file.";
					break;

				case 404:
					bioHolder.innerHTML  = "ERROR: Database file not found.";
					break;

				default:
					bioHolder.innerHTML  = "ERROR: Please refresh the page and try again.";
			}
		};
		xhr.send(params);
	}
})();