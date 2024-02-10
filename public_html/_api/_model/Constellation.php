<?php
    include_once  dirname(__FILE__) . '/father_model/DBInter.php';
    
    class Constellation extends DBInter {
       
        public $consID;
        public $consName;
        public $startDate;
        public $endDate;
        public $description;
        public $consImg;

        public function Select() {
            return $this->GetQuery('SELECT  * FROM CONSTELLATION WHERE consID = ?', array($this->consID));
        }
        
        public function SelectAll() {
            return $this->GetQuery('SELECT * FROM CONSTELLATION');
        }

        public function SelectConsCountStar() {
            //Seleziona il numero di stelle presente per ogni costellazione
            return $this->GetQuery('SELECT COUNT(S.starID)  , C.consName, C.consID  FROM CONSTELLATION	AS C LEFT JOIN STAR AS S ON C.consID = S.consFK GROUP BY C.consID');
        }

        public function Insert() {
            return $this->ModelQuery(  'INSERT INTO CONSTELLATION SET consName = ?, startDate = ?, endDate = ?, description = ?, consImg = ?', 
                                array($this->consName, $this->startDate, $this->endDate, $this->description, $this->consImg) );
        }

        public function Update() {  
            return $this->ModelQuery('UPDATE CONSTELLATION SET consName = ?, startDate = ?, endDate = ?, description = ?, consImg = ? WHERE consID = ?', 
                                    array($this->consName, $this->startDate, $this->endDate, $this->description, $this->consImg, $this->consID));
        }

        public function Delete() {
            return $this->ModelQuery('DELETE FROM CONSTELLATION WHERE consID = ?', array($this->consID));
        }
    }

?>