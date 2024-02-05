<?php
    include_once  dirname(__FILE__) . '/DBInter.php';

    class Sub extends DBInter {
     
        public $subID;
        public $userFK;
        public $starFK;
        public $startDate;
        public $life;

                
        public function Select() {
            return $this->GetQuery('SELECT * FROM SUB WHERE subID = ?', 's', array($this->subID));
        }

        public function SelectAll() {
            return $this->GetQuery('SELECT * FROM SUB ');
        }

        public function SelectUserSub() {
            return $this->GetQuery('SELECT * FROM SUB JOIN STAR ON starFK = starID WHERE userFK = ?', 's', array($this->userFK));
        }

        public function Insert() {
            return $this->ModelQuery('INSERT INTO SUB SET starFK = ?, userFK = ?, life = ?',   'sss', 
                                array( $this->starFK, $this->userFK, $this->life));
        }

        public function Update() {  
            return $this->ModelQuery('UPDATE SUB SET starFK = ?, startDate = ?, life = ?, userFK = ? WHERE subID = ?', 'sssss',
                                    array($this->starFK, $this->startDate, $this->life, $this->userFK, $this->subID));
        }

        public function Delete() {
            return $this->ModelQuery('DELETE FROM SUB WHERE subID = ?', 's', array($this->subID));
        }
    }
?>