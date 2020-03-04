<?php
	
	class Videos {
		private $database;

		public function __construct() {
			$this->database = new Database;
		}

		public function getVideo($param) {
			$sql = "SELECT * FROM video WHERE id = :id";
			$this->database->query($sql);
			$this->database->bind(':id', $param);
			return $this->database->fetch();
		}

		public function insertVideo($param) {
			$sql = "INSERT INTO video (attributes) VALUES (:vals)";
		}

		public function deleteVideo($param) {
			$sql = "DELETE FROM video WHERE id = :id";
		}

		public function parseYoutubeLink($link) {
			$link = str_replace('http:', 'https:', $link);
			$link = str_replace('youtu.be', 'www.youtube.com/embed', $link);
			$link = str_replace('watch?v=', 'embed/', $link);
			$link = (strpos($link, '&') !== false) ? substr($link, 0, strpos($link, '&')) : $link;
			$link = (strpos($link, '?') !== false) ? substr($link, 0, strpos($link, '?')) : $link;
			return $link;
		}

		public function parseVimeoLink($link) {
			// ...
		}
	}