<?php
	
	class Bios {
		private $db;

		public function __construct() {
			$this->db = new Database();
		}

		public function getBio() {
			// Get Latest Version Of Bio
			$sql = "SELECT * FROM bio ORDER BY id DESC LIMIT 1";
			$this->db->query($sql);
			return $this->db->fetch();
		}

		public function updateBio($newBio) {
			$sql = "INSERT INTO bio (body) VALUES (:bio)";
			$this->db->query($sql);
			$this->db->bind(':bio', $newBio);
			if ($this->db->execute()) {
				return true;
			}
			else {
				return false;
			}
		}
	}