<?php
	
	class Core {
		protected $controller = 'Photo';
		protected $method     = 'index';
		protected $params     = [];

		public function __construct() {
			$url = $this->fetchUrl();

			// Controller
			if (file_exists('../app/controller/' . ucwords($url[0]) . '.php')) {
				$this->controller = ucwords($url[0]);
				unset($url[0]);
			}
			require_once "../app/controller/{$this->controller}.php";
			$this->controller = new $this->controller;

			// Method
			if (isset($url[1])) {
				if (method_exists($this->controller, $url[1])) {
					$this->method = $url[1];	
				}
				unset($url[1]);
			}

			// Params
			if ($url) {
				$this->params = array_values($url);
			}

			// Call
			call_user_func_array(
				[
					$this->controller,
					$this->method
				],
				$this->params
			);
		}

		private function fetchUrl() {
			if (isset($_GET['url'])) {
				$url = $_GET['url'];
				$url = rtrim($url, '/');
				$url = filter_var($url, FILTER_SANITIZE_URL);
				$url = explode('/', $url);
				return $url;
			}
		}
	}