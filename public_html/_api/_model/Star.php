<?php
    include_once  dirname(__FILE__) . '/father_model/DBInter.php';

    class Star extends DBInter {
        
        public $starID;
        public $consFK;
        public $starName;
        public $dLY;
        public $price;

        public function Select() {
            return $this->GetQuery('SELECT  * FROM STAR WHERE starID = ?', array($this->starID));
        }
        
        public function SelectConsStar() {
            return $this->GetQuery('SELECT  * FROM STAR WHERE consFK = ?', array($this->consFK));
        }

        public function SelectStarCons() {
            return $this->GetQuery('SELECT  * FROM STAR JOIN CONSTELLATION ON consFK = consID WHERE starID = ?', array($this->starID));
        }

        public function SelectAll() {
            return $this->GetQuery('SELECT * FROM STAR');
        }

        public function SelectStarAvg() {
            //Media dei voti delle recensioni per le stelle che hanno delle valutaizioni
            return $this->GetQuery(' SELECT AVG(R.vote), S.starID, S.starName FROM STAR AS S INNER JOIN REVIEW AS R ON S.starID = R.starFK GROUP BY S.starID');
        }

        public function Insert() {
            return $this->ModelQuery('INSERT INTO STAR SET starName = ?, consFK = ?, price = ?, dLY = ?', 
                                    array( $this->starName, $this->consFK, $this->price, $this->dLY));
        }
        
        public function Update() {  
            return $this->ModelQuery('UPDATE STAR SET consFK = ?, price = ?, dLY = ?, starName = ? WHERE starID = ?',
                                    array($this->consFK, $this->price, $this->dLY, $this->starName, $this->starID));
        }

        public function Delete() {
            return $this->ModelQuery('DELETE FROM STAR WHERE starID = ?', array($this->starID));
        }
    }
?>