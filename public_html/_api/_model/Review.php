<?php
    include_once  dirname(__FILE__) . '/father_model/DBInter.php';

    class Review extends DBInter {
      
        public $reviewID;
        public $starFK;
        public $userFK;
        public $vote;
        public $note;
        public $revDate;

        public function Select() {
            return $this->GetQuery('SELECT  * FROM REVIEW WHERE  reviewID = ?', array($this->reviewID));
        }

        public function SelectAll() {
            return $this->GetQuery('SELECT * FROM REVIEW');
        }

        public function SelectStarReviews() {
            return $this->GetQuery('SELECT  * FROM REVIEW JOIN USER ON userFK = userID WHERE starFK = ? ORDER BY revDate DESC', array($this->starFK));
        }

        public function SelectCountUser() {
            return $this->GetQuery('SELECT  COUNT(*) AS revCount FROM REVIEW  WHERE userFK = ?', array($this->userFK));    
        }

        public function SelectCountReview() {
            return $this->GetQuery('SELECT  * FROM REVIEW  WHERE starFK = ? AND userFK = ?', array($this->starFK, $this->userFK));
        }

        public function Insert() {
            return $this->ModelQuery('INSERT INTO REVIEW SET starFK = ?, userFK = ?, vote = ?, note = ?', 
                                    array( $this->starFK, $this->userFK, $this->vote, $this->note));
        }
    
        public function Update() {  
            return $this->ModelQuery('UPDATE REVIEW SET starFK  = ?, userFK = ?, vote = ?, note = ?, revDate = ? WHERE reviewID = ?',
                                    array($this->starFK, $this->userFK, $this->vote, $this->note, $this->revDate, $this->reviewID));
        }

        public function Delete() {
            return $this->ModelQuery('DELETE FROM REVIEW WHERE reviewID = ?', array($this->reviewID));
        }
    }
?>
