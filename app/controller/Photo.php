<?php
	
	class Photo extends Controller {
		public function __construct() {
			$this->photoModel = $this->model('Photos');
		}
		public function index() {
			$photosData = $this->photoModel->getPhotosData();
			$data = [
				'photo1' => $photosData[0],
				'photo2' => $photosData[1],
				'photo3' => $photosData[2],
				'photo4' => $photosData[3],
				'photo5' => $photosData[4],
				'photo6' => $photosData[5],
				'photo7' => $photosData[6],
				'photo8' => $photosData[7]
			];
			$this->view('photo/index', $data);
		}
	}