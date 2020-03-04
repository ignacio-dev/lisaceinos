(function uiScope() {
	var hamb = document.getElementById("hamb");
	var menus = document.getElementById("mainmenus");

	// Fades
	function setDuration(elem, ms) {
		elem.style.webkitAnimationDuration = ms + "ms";
		elem.style.animationDuration = ms + "ms";	
	}

	function fadeOut(elem, ms) {
		setDuration(elem, ms);
		elem.classList.remove("fadeIn");
		elem.classList.add("fadeOut");
	}

	function fadeIn(elem, ms) {
		setDuration(elem, ms);
		elem.classList.remove("fadeOut");
		elem.classList.add("fadeIn");
	}

	function fadeToggle(elem, ms) {
		elem.className !== "fadeOut" ? fadeOut(elem, ms) : fadeIn(elem, ms);
	}

	// Media Query
	function mediaQuery(x) {
		if (x.matches) {
			fadeOut(menus, ".1");
		}
		else {
			fadeIn(menus, ".1");
			hamb.classList.remove("open");
		}
	}

	// Init
	(function init() {
		hamb.onclick = function() {
			hamb.classList.toggle("open");
			fadeToggle(menus, 1000);	
		};
		var x = window.matchMedia("screen and (max-width: 768px)");
		mediaQuery(x);
		x.addListener(mediaQuery);
	})();
})();