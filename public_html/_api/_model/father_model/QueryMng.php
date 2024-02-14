<?php
    include_once dirname(__FILE__). '/Conn.php';

    class QueryMng {
        private $conn;
        public function __construct() { $this->conn = new Conn(); }

        private function STMTQuery($query, $data) {
            $dataType = "";
            foreach ($data as $x ) { $dataType .= "s"; }
            try  {
                $stmt = $this->conn->GetConn()->prepare($query); 
                $stmt->bind_param($dataType, ...$data);
                $stmt->execute();
            }   
            catch(mysqli_sql_exception $e) {
                die(json_encode(array('status' => 500, 'message' => "Errore nel DB, prova a inserire i dati come indicato o riprova più tardi")));
            }
            return $stmt;
        }

        private function NORMQuery($query) {    
            try  {  return $this->conn->GetConn()->query($query); }   
            catch(mysqli_sql_exception $e) { 
                die(json_encode(array('status' => 500, 'message' =>  "Errore nel DB, prova a inserire i dati come indicato o riprova più tardi")));
            }
    
        }

        public function ModelQuery($query, $data=NULL) {
            $result = ($data === NULL)? $this->NORMQuery($query) : $this->STMTQuery($query, $data);
            return $result;
        }

        public function GetQuery($query, $data=NULL) { 
            $result = ($data === NULL)? $this->NORMQuery($query) : $this->STMTQuery($query, $data)->get_result();
            return $result;     
        }
    }
?>
