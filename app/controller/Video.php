<?php
	
	class Video extends Controller {
		public function __construct() {
			$this->vidModel  = $this->model('Videos');
		}

		public function index() {
			$this->view('video/index');
		}

		public function display($param) {
			$vid  = $this->vidModel->getVideo($param);
			$data = [
				'video_id'       => $vid->id,
				'video_title'    => $vid->title,
				'video_author'   => $vid->author,
				'video_platform' => $vid->platform,
				'video_link'     => $vid->link,
				'video_role'     => $vid->roll
			];
			$this->view('video/display', $data);
		}
	}