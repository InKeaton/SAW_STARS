<?php
    include_once  $_SERVER['DOCUMENT_ROOT'] . '/model/DBInter.php';

    class SubStar extends DBInter {
    
        public $substarID;
        public $starFK;
        public $subFK;

        public function Select() {
            return $this->GetQuery('SELECT  * FROM SUBSTAR WHERE substarID = ?', 's', array($this->substarID));
        }

        public function SelectAll() {
            return $this->GetQuery('SELECT * FROM SUBSTAR');
        }

        public function Insert() {
            return $this->ModelQuery('INSERT INTO SUBSTAR SET  starFK = ?, subFK = ?', 'ss', 
                                array( $this->starFK, $this->subFK)   );
        }
    
        public function Update() {  
            return $this->ModelQuery('UPDATE SUBSTAR SET starFK = ?, subFK = ? WHERE substarID = ?', 'sss', 
                                    array($this->starFK, $this->subFK, $this->substarID));
        }

        public function Delete() {
            return $this->ModelQuery('DELETE FROM SUBSTAR WHERE substarID = ?', 's', array($this->substarID));
        }
    }
?>