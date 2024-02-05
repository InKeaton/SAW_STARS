<?php
    include_once dirname(__FILE__) . '/QueryMng.php';

	abstract class DBInter {

		abstract public function Select();
        abstract public function SelectAll();
		abstract public function Insert();
		abstract public function Update();
		abstract public function Delete();

		private $qMng;
		private $outField = [];

        final public function __construct() {
			$this->qMng = new QueryMng();
		}

		private function PushOutField($input) { array_push( $this->outField, $input);  }

        private function PopOutField() { 
			$ret = $this->outField; 
			unset($this->outField);
			$this->outField = [];
			return $ret;
		}

		final public function ModelQuery($query, $type=NULL, $data=NULL) { return $this->qMng->Query($query, $type, $data); }
		
		final public function GetQuery($query, $type=NULL, $data=NULL) {
			$result = $this->qMng->Query($query, $type, $data);
			if(!$result) return false;
			while ($row = $result->fetch_object()) $this->PushOutField($row);
			return $this->PopOutField();
		}
	
	}		

?>
