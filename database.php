<?php

	include_once 'config.php';

	class Database {

		// Private Variables
		private $host = DB_HOST;
		private $dbname = DB_NAME;
		private $username = DB_USER;
		private $password = DB_PASS;

		// Public Variables
		public $conn;

		// Establish Database Connection
		public function getConnection() {

			$this->conn = null;

			try {
				$this->conn = new PDO("mysql:host=".$this->host.";dbname=".$this->dbname, $this->username, $this->password);	
			} catch(PDOException $ex) {
				echo "Connection Error:" . $ex->getMessage();
			}

			return $this->conn;

		}
	}

?>