<?php
    include_once dirname(__FILE__). '/Conn.php';

    class QueryMng {
        private $conn;
        public function __construct() { $this->conn = new Conn(); }

        private function STMTQuery($query, $data) {
            $dataType = "";
            foreach ($data as $x ) { $dataType .= "s"; }
            $stmt = $this->conn->GetConn()->prepare($query);
            $stmt->bind_param($dataType, ...$data);
            $stmt->execute();
            return  $stmt->get_result();
        }

        private function NORMQuery($query) {
            return $this->conn->GetConn()->query($query);
        }

        public function Query($query, $data=NULL) { 
            try {
                $result = ($data === NULL)? $this->NORMQuery($query) : $this->STMTQuery($query, $data);
                return ($result === false)? true : $result;     
            } catch(mysqli_sql_exception $e) {
                die(json_encode(array('status' => 500, 'message' =>  $e->getMessage())));
            }
        }
    }
?>