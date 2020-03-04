(function contactScope() {
	// Add Submitted Class To Form For Error Displaying
	(function addSubmittedClass() {
		var sendBtn = document.getElementById("sendBtn");
		sendBtn.onclick = function() {
			var form = document.getElementsByTagName("form")[0];
			form.classList.add("submitted");
		}
	})();

	// Textarea Auto Resize
	(function textareaAutoResize() {
		var textArea = document.getElementsByTagName("textarea")[0];
		textArea.style.overflow = "hidden";
		var offset = textArea.offsetHeight - textArea.clientHeight;
		document.addEventListener("input", function(event) {
			event.target.style.height = event.target.scrollHeight + offset + "px";
		});
		if (textArea.scrollHeight > 100) {
			textArea.style.height = textArea.scrollHeight + "px";
		}
	})();
})();