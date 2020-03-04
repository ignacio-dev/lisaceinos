<?php
	
	class User {
		private $db;

		public function __construct() {
			$this->db = new Database();
		}

		public function findByUsername($username) {
			$sql = "SELECT * FROM users WHERE username = :username";
			$this->db->query($sql);
			$this->db->bind(":username", $username);
			$row = $this->db->fetch();
			return ($this->db->countRows() > 0) ? true : false;
		}

		public function login($username, $pwd) {
			$sql = "SELECT * FROM users WHERE username = :username";
			$this->db->query($sql);
			$this->db->bind(":username", $username);
			$row = $this->db->fetch();
			$hash = $row->pwd;
			return (password_verify($pwd, $hash)) ? $row : false;
		}
	}