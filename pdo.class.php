<?php

	class PDO {


		private $db_host = 'localhost';		// Database Host
		private $db_user = '';			    // Username
		private $db_pass = '';		        // Password
		private $db_name = '';			    // Database

		public $conn;

		public function connect() {
			try {
				$this->conn = new PDO("mysql:host=".$this->db_host.";dbname=".$this->db_name, $this->db_user, $this->db_pass);
				$this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
				$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			}
			catch(PDOException $e) {
				return $e->getMessage();
			}
		}

		public function disconnect() {
			$this->conn = NULL;
		}

		public function setDatabase($db) {
			$this->disconnect();
			$this->db_name = $db;
			$this->connect();
		}
	}

?>