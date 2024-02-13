<?php
    include_once  dirname(__FILE__) . '/father_model/DBInter.php';
    
    class Constellation extends DBInter {
       
        public $consID;
        public $consName;
        public $startDate;
        public $endDate;
        public $description;

        public function Select() {
            return $this->GetQuery('SELECT  * FROM CONSTELLATION WHERE consID = ?', array($this->consID));
        }
        
        public function SelectAll() {
            return $this->GetQuery('SELECT * FROM CONSTELLATION');
        }

        public function SelectConsCountStar() {
            //Seleziona il numero di stelle presente per ogni costellazione
            return $this->GetQuery('SELECT COUNT(S.starID) AS conStar, SUM(R.vote)  AS numVote, AVG(R.vote) AS consAvg, C.*
                                    FROM CONSTELLATION	AS C LEFT JOIN STAR AS S ON C.consID = S.consFK LEFT JOIN REVIEW AS R ON R.starFK = S.starID 
                                    WHERE C.consID = ? GROUP BY C.consID ',   array($this->consID) );
        }

        public function Insert() {
            return $this->ModelQuery('INSERT INTO CONSTELLATION SET consName = ?, startDate = ?, endDate = ?, description = ?', 
                                array($this->consName, $this->startDate, $this->endDate, $this->description) );
        }

        public function Update() {  
            return $this->ModelQuery('UPDATE CONSTELLATION SET consName = ?, startDate = ?, endDate = ?, description = ?  WHERE consID = ?', 
                                    array($this->consName, $this->startDate, $this->endDate, $this->description,  $this->consID));
        }

        public function Delete() {
            return $this->ModelQuery('DELETE FROM CONSTELLATION WHERE consID = ?', array($this->consID));
        }
    }

?>
