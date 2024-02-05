<?php
    include_once  dirname(__FILE__) . '/DBInter.php';
    
    class Constellation extends DBInter {
       
        public $consID;
        public $consName;
        public $startDate;
        public $endDate;
        public $description;
        public $consImg;

        public function Select() {
            return $this->GetQuery('SELECT  * FROM CONSTELLATION WHERE consID = ?', 's', array($this->consID));
        }
        
        public function SelectAll() {
            return $this->GetQuery('SELECT * FROM CONSTELLATION');
        }

        public function Insert() {
            return $this->ModelQuery(  'INSERT INTO CONSTELLATION SET consName = ?, startDate = ?, endDate = ?, description = ?, consImg = ?', 
                                'sssss',  array($this->consName, $this->startDate, $this->endDate, $this->description, $this->consImg) );
        }

        public function Update() {  
            return $this->ModelQuery('UPDATE CONSTELLATION SET consName = ?, startDate = ?, endDate = ?, description = ?, consImg = ? WHERE consID = ?', 'ssssss',
                                    array(
                                        $this->consName, $this->startDate, $this->endDate, $this->description, $this->consImg, $this->consID
                                    ));
        }

        public function Delete() {
            return $this->ModelQuery('DELETE FROM CONSTELLATION WHERE consID = ?', 's', array($this->consID));
        }
    }

?>