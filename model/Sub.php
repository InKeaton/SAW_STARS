<?php
    include_once  $_SERVER['DOCUMENT_ROOT'] . '/model/DBInter.php';

    class Sub extends DBInter {
     
        public $subID;
        public $userFK;
        public $subName;
        public $startDate;
        public $life;

                
        public function Select() {
            return $this->GetQuery('SELECT  * FROM SUB WHERE subID = ?', 's', array($this->subID));
        }

        public function SelectAll() {
            return $this->GetQuery('SELECT * FROM SUB ');
        }

        public function Insert() {
            return $this->ModelQuery('INSERT INTO SUB SET subName = ?, userFK = ?, life = ?',   'sss', 
                                array( $this->subName, $this->userFK, $this->life));
        }

        public function Update() {  
            return $this->ModelQuery('UPDATE SUB SET subName = ?, startDate = ?, life = ?, userFK = ? WHERE subID = ?', 'sssss',
                                    array($this->subName, $this->startDate, $this->life, $this->userFK, $this->subID));
        }

        public function Delete() {
            return $this->ModelQuery('DELETE FROM SUB WHERE subID = ?', 's', array($this->subID));
        }
    }
?>