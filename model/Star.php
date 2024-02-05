<?php
    include_once  dirname(__FILE__) . '/DBInter.php';

    class Star extends DBInter {
        
        public $starID;
        public $consFK;
        public $starName;
        public $dLY;
        public $price;

        public function Select() {
            return $this->GetQuery('SELECT  * FROM STAR WHERE starID = ?', 's', array($this->starID));
        }

        public function SelectConsStar() {
            return $this->GetQuery('SELECT  * FROM STAR WHERE consFK = ?', 's', array($this->consFK));
        }

        public function SelectAll() {
            return $this->GetQuery('SELECT * FROM STAR');
        }

        public function Insert() {
            return $this->ModelQuery('INSERT INTO STAR SET starName = ?, consFK = ?, price = ?, dLY = ?', 
                                'ssss', array( $this->starName, $this->consFK, $this->price, $this->dLY));
        }
        
        public function Update() {  
            return $this->ModelQuery('UPDATE STAR SET consFK = ?, price = ?, dLY = ? starName = ? WHERE starID = ?', 'sssss',
                                    array($this->consFK, $this->price, $this->dLY, $this->starName, $this->starID));
        }

        public function Delete() {
            return $this->ModelQuery('DELETE FROM STAR WHERE starID = ?', 's', array($this->starID));
        }
    }
?>