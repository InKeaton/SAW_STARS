<?php
	include_once $_SERVER['DOCUMENT_ROOT'] . '/utils/header.php';
	define('SERVER_NAME', $env['SERVER_NAME']);
	define('USERNAME', $env['USERNAME']);
	define('PASSWORD', $env['PASSWORD']);
	define('DB_NAME', $env['DB_NAME']);
	
	class Conn {
		private $conn;
		function __construct() {
			$this->conn = new mysqli(SERVER_NAME, USERNAME, PASSWORD, DB_NAME);;
			if($this->conn->connect_errno) 
				die(json_encode(array('status' => 0, 'message' => 'Connection: ' . $this->conn->connect_error)));
		}
		
		function __destruct() { $this->conn->close(); }
		public function GetConn() { return $this->conn; }	
	}
?>