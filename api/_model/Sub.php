<?php
    include_once  dirname(__FILE__) . '/father_model/DBInter.php';

    class Sub extends DBInter {
     
        public $subID;
        public $userFK;
        public $starFK;
        public $startDate;
        public $life;

                
        public function Select() {
            return $this->GetQuery('SELECT * FROM SUB WHERE subID = ?', array($this->subID));
        }

        public function SelectAll() {
            return $this->GetQuery('SELECT * FROM SUB ');
        }

        public function SelectUserSub() {
            return $this->GetQuery('SELECT * FROM SUB JOIN STAR ON starFK = starID WHERE userFK = ?', array($this->userFK));
        }

        public function Insert() {
            return $this->ModelQuery('INSERT INTO SUB SET starFK = ?, userFK = ?, life = ?', array( $this->starFK, $this->userFK, $this->life));
        }

        public function Update() {  
            return $this->ModelQuery('UPDATE SUB SET starFK = ?, startDate = ?, life = ?, userFK = ? WHERE subID = ?', 
                                    array($this->starFK, $this->startDate, $this->life, $this->userFK, $this->subID));
        }

        public function Delete() {
            return $this->ModelQuery('DELETE FROM SUB WHERE subID = ?', array($this->subID));
        }

        public function DeleteSubUserStar() {
            return $this->ModelQuery('DELETE FROM SUB WHERE userFK = ? AND starFK = ?', array($this->userFK, $this->starFK));
        }
    }
?>