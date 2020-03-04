<?php
	
	class About extends Controller {
		public function __construct() {
			$this->bioModel = $this->model('Bios');
		}

		public function index() {
			$bio = $this->bioModel->getBio();
			$data = [
				'bio' => $bio
			];
			$this->view('about/index', $data);
		}
	}