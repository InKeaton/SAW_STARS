<?php
    include_once dirname(__FILE__)   .   '/includeSub.php';
    /**
     * Parte di controllo dei dati in input
     */
    isMethod('POST');
    postEmptyField('subID');
    /**
     * Parte di fetch dei dati e di comunicazione con il db
     */
    $sub = new Sub();
    $sub->subID = $_POST['subID'];
    
    $result = $sub->Select()[0];
    if(!isset($result))
      die(json_encode(array('status' => 0, 'message' => 'Star Not Found!')));

    $sub->userFK      =   (empty($_POST["userFK"]))       ?   $result->userFK     : $_POST["userFK"];
    $sub->starFK      =   (empty($_POST["starFK"]))       ?   $result->starFK     : $_POST["starFK"];
    $sub->startDate   =   (empty($_POST["startDate"]))    ?   $result->startDate  : $_POST["startDate"];
    $sub->life        =   (empty($_POST["life"]))         ?   $result->life       : $_POST["life"];
  
    if(!($sub->Update())) 
      die(json_encode(array('status' => 0, 'message' => 'Failed to Update Star!')));
 
    echo json_encode(array('status' => 200, 'message' => 'Success!!'));
?>