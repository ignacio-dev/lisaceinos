(function photoScope() {
	// Global Vars
	var currentPhoto = 1;
	var thumbnails = document.getElementsByTagName("figure");

	// Modal Elements Factory
	function newModalElement(name, css, content) {
		var element = document.createElement(name);
		element.classList.add(css);
		if (content) element.innerHTML = content;
		return element;
	}

	// Modal Elements
	var modal    = newModalElement("div",  "modal"                   );
	var	closeBtn = newModalElement("span", "close-button", "&times;" );
	var	frame    = newModalElement("div",  "frame"                   );
	var	bigPhoto = newModalElement("img",  "big-photo"               );
	var	prev     = newModalElement("a",    "prev",         "&#10094;");
	var	next     = newModalElement("a",    "next",         "&#10095;");

	var	arrows = [next, prev];

	// Global Functions
	function setBigPhoto() {
		var currentPhotoVersion = photoVersions[currentPhoto - 1];
		bigPhoto.src = "img/photo/photo" + currentPhoto + ".jpg?v=" + currentPhotoVersion;
	}

	function setThumbnails(x) {
		var photoIndex = x + 1;
		thumbnails[x].onclick = function() {
			currentPhoto = photoIndex;
			setBigPhoto(x);
			openModal();
		};
	}

	function appendModal() {
		document.getElementById("photo").appendChild(modal);

		var modalNodes = [closeBtn, frame];
		for (var i = 0; i < modalNodes.length; i++) {
			modal.appendChild(modalNodes[i]);
		}

		var frameNodes = [bigPhoto, prev, next];
		for (var ii = 0; ii < frameNodes.length; ii++) {
			frame.appendChild(frameNodes[ii]);
		}
	}

	function openModal() {
		// modal.style.display = "block";
		modal.classList.add("show");
	}

	function closeModal() {
		modal.classList.remove("show");
		// modal.style.display = "none";
	}

	function nextPhoto() {
		currentPhoto == thumbnails.length ? currentPhoto = 1 : currentPhoto++;
		setBigPhoto();
	}

	function previousPhoto() {
		currentPhoto == 1 ? currentPhoto = thumbnails.length : currentPhoto--;
		setBigPhoto();
	}

	function keyboardShortcuts(e) {
		if (e.keyCode == 27) closeModal();
		if (e.keyCode == 37) previousPhoto();
		if (e.keyCode == 39) nextPhoto();
	}

	function setClicks() {
		closeBtn.onclick = closeModal;
		prev.onclick     = previousPhoto;
		next.onclick     = nextPhoto;	
	}
	
	// Init
	(function init() {
		for (var i = 0; i < thumbnails.length; i++) {
			setThumbnails(i);
		}
		appendModal();
		document.onkeydown = keyboardShortcuts;
		setClicks();
	})();		
})();