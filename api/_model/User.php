<?php
    include_once  dirname(__FILE__) . '/father_model/DBInter.php';
    class User extends DBInter{

        public $userID;
        public $role;
        public $email;
        public $pwd;
        public $firstName;
        public $lastName;
        public $img;
        public $createDate;

        public function Select() {
            return $this->GetQuery('SELECT  * FROM USER WHERE userID = ?', array($this->userID));
        }

        public function SelectEmail() {
            return $this->GetQuery('SELECT * FROM USER WHERE email = ?', array($this->email));
        }

        public function SelectAll() {
            return $this->GetQuery('SELECT * FROM USER ');
        }

        public function Insert() {
            return $this->ModelQuery('INSERT INTO USER SET email = ?, pwd = ?, firstName = ?, lastName = ?', 
                                    array($this->email, $this->pwd, $this->firstName, $this->lastName));
        }

        public function Update() {  
            return $this->ModelQuery('UPDATE USER SET role = ?, email = ?, pwd = ?, firstName = ?, lastName = ?, img = ?, createDate = ? WHERE userID = ?', 
                                    array($this->role, $this->email, $this->pwd, $this->firstName, $this->lastName, $this->img, $this->createDate, $this->userID));
        }

        public function UpdateRole() {
            return $this->ModelQuery('UPDATE USER SET role = ? WHERE userID = ?', array($this->role, $this->userID));
        }

        public function Delete() {
            return $this->ModelQuery('DELETE FROM USER WHERE userID = ?', array($this->userID));
        }
    }
?>