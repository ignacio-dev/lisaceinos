<?php
	
	class Photos {
		private $db;

		public function __construct() {
			$this->db = new Database();
		}

		public function getPhotosData() {
			$sql = "SELECT * FROM photo";
			$this->db->query($sql);
			return $this->db->fetchAll();
		}

		public function updatePhotoVersion($newVersion, $id) {
			$sql = "UPDATE photo SET version = :version WHERE id = :id";
			$this->db->query($sql);
			$this->db->bind(':version', $newVersion);
			$this->db->bind(':id', $id);
			return ($this->db->execute()) ? true : false;
		}
	}