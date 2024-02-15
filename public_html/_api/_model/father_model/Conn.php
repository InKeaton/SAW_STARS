<?php
	class Conn {
		private $conn;
		function __construct() {
			$this->conn = new mysqli('localhost', 'root', '', 'galileoDb');
			if($this->conn->connect_errno) 
				die(json_encode(array('status' => 0, 'message' => 'Connection: ' . $this->conn->connect_error)));
		}
		
		function __destruct() { $this->conn->close(); unset($this->conn);}
		public function GetConn() { return $this->conn; }	
	}
?>
