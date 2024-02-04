<?php

    include_once $_SERVER['DOCUMENT_ROOT'] . '/model/Conn.php';
    class QueryMng {
        private $conn;
        public function __construct() { $this->conn = new Conn(); }

        private function STMTQuery($query, $typeData, $data) {
            $stmt = $this->conn->GetConn()->prepare($query);
            $stmt->bind_param($typeData, ...$data);
            $stmt->execute();
            return  $stmt->get_result();
        }

        private function NORMQuery($query) {
            return $this->conn->GetConn()->query($query);
        }

        public function Query($query, $typeData=NULL, $data=NULL) { 
            try {
                $result = ($typeData === NULL)? $this->NORMQuery($query) : $this->STMTQuery($query, $typeData, $data);
                return ($result === false)? true : $result;     
            } catch(mysqli_sql_exception $e) {
                die(json_encode(array('status' => 500, 'message' =>  $e->getMessage())));
            }
        }
    }
?>