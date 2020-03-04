<?php
	
	class Database {
		private $host   = DB_HOST;
		private $user   = DB_USER;
		private $pswd   = DB_PSWD;
		private $dbname = DB_NAME;

		private $dsn;
		private $options;

		private $handler;
		private $stmt;
		private $error;

		public function __construct() {
			$this->dsn = "mysql:host={$this->host};dbname={$this->dbname}";
			$this->options = array(
				PDO::ATTR_PERSISTENT => true,
				PDO::ATTR_ERRMODE    => PDO::ERRMODE_EXCEPTION,
				PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
			);
			try {
				$this->handler = new PDO(
					$this->dsn,
					$this->user,
					$this->pswd,
					$this->options
				);
			}
			catch (PDOException $e) {
				// $this->error = $e->getMessage();
				// echo $this->error;
			}
		}

		public function query($sql) {
			$this->stmt = $this->handler->prepare($sql);
		}

		public function bind($param, $val, $type = null) {
			if (is_null($type)) {
				switch (true) {
					case is_int($val):
						$type = PDO::PARAM_INT;
						break;
					case is_bool($val):
						$type = PDO::PARAM_BOOL;
						break;
					case is_null($val):
						$type = PDO::PARAM_NULL;
						break;
					default:
						$type = PDO::PARAM_STR;
				}
			}
			$this->stmt->bindValue($param, $val, $type);
		}

		public function execute() {
			return $this->stmt->execute();
		}

		public function fetchAll() {
			$this->execute();
			return $this->stmt->fetchAll(PDO::FETCH_OBJ);
		}

		public function fetch() {
			$this->execute();
			return $this->stmt->fetch(PDO::FETCH_OBJ);
		}

		public function countRows() {
			return $this->stmt->rowCount();
		}
	}