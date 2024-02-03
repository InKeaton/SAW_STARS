<?php
    include_once  $_SERVER['DOCUMENT_ROOT'] . '/model/DBInter.php';

    class Review extends DBInter {
      
        public $reviewID;
        public $starFK;
        public $userFK;
        public $vote;
        public $note;
        public $revDate;

        public function Select() {
            return $this->GetQuery('SELECT  * FROM REVIEW WHERE  reviewID = ?', 's', array($this->reviewID));
        }

        public function SelectAll() {
            return $this->GetQuery('SELECT * FROM REVIEW');
        }
    
        public function Insert() {
            return $this->ModelQuery('INSERT INTO REVIEW SET starFK = ?, userFK = ?, vote = ?, note = ?', 
                                'ssss', array( $this->starFK, $this->userFK, $this->vote, $this->note) );
        }
    
        public function Update() {  
            return $this->ModelQuery('UPDATE REVIEW SET starFK  = ?, userFK = ?, vote = ?, note = ?, revDate = ? , WHERE reviewID = ?', 'ssssss',
                                    array($this->starFK, $this->userFK, $this->vote, $this->note, $this->revDate, $this->reviewID));
        }

        public function Delete() {
            return $this->ModelQuery('DELETE FROM REVIEW WHERE reviewID = ?', 's', array($this->reviewID));
        }
    }
?>