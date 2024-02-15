<?php
    include_once dirname(__FILE__). '/Conn.php';

    class QueryMng {
        private $conn;
        #Salva se il valore della query è andato a buon fine o meno
        private $executeResult;
        #Salva il risultato della query nel caso si dovesse trattare di una query di select
        private $sqlResult;

        function __construct() { $this->conn = new Conn(); }
        function __destruct() { unset($this->conn); }
    
        private function STMTQuery($query, $data) {
            $dataType = "";
            foreach ($data as $x ) { $dataType .= "s"; }
            try  {
                $stmt = $this->conn->GetConn()->prepare($query); 
                $stmt->bind_param($dataType, ...$data);
                $this->executeResult =  $stmt->execute();
                $this->sqlResult =  $stmt->get_result();
                $stmt->close();
            }   
            catch(mysqli_sql_exception $e) {
                die(json_encode(array('status' => 500, 'message' => "Errore nel DB, prova a inserire i dati come indicato o riprova più tardi")));
            }
            
        }

        private function NORMQuery($query) {    
            try  {  $this->sqlResult = $this->executeResult = $this->conn->GetConn()->query($query); }   
            catch(mysqli_sql_exception $e) { 
                die(json_encode(array('status' => 500, 'message' =>  "Errore nel DB, prova a inserire i dati come indicato o riprova più tardi")));
            }
    
        }

        public function ModelQuery($query, $data=NULL) {
            if($data === NULL) $this->NORMQuery($query);
            else $this->STMTQuery($query, $data);
            return $this->executeResult;
        }

        public function GetQuery($query, $data=NULL) { 
            if($data === NULL) $this->NORMQuery($query);
            else $this->STMTQuery($query, $data);
            return $this->sqlResult;   
        }
    }
?>
