<?php
	
	// Load Helpers
	require_once '../app/helpers/head_helper.php';
	require_once '../app/helpers/session_helper.php';
	
	// Load Libs
	spl_autoload_register(function($className) {
		require_once "../app/lib/{$className}.php";
	});