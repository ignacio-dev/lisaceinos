<?php
	
	class Controller {
		public function model($model) {
			$path = "../app/model/{$model}.php";
			if (file_exists($path)) {
				require_once $path;
				return new $model;
			}
			else {
				die('Model not available.');
			}
		}

		public function view($view, $data = []) {
			$path = "../app/view/{$view}.php";
			if (file_exists($path)) {
				$current = get_class($this);
				require_once $path;
			}
			else {
				die('View not available.');
			}
		}
	}