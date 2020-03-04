<?php
	
	// SET TITLE'S APPENDAGE
	function titleAppend($className) {
		if ($className != "Photo") {
			return " | {$className}";
		}
	}

	function redirect($link) {
		header("Location: " . URLROOT . "/". $url);
	}