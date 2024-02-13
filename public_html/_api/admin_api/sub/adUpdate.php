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
    
    $result = $sub->Select();
    if(count($result) === 0)
      die(json_encode(array('status' => 0, 'message' => 'Star Not Found!')));

    $sub->userFK      =   (empty($_POST["userFK"]))       ?   $result[0]->userFK     : $_POST["userFK"];
    $sub->starFK      =   (empty($_POST["starFK"]))       ?   $result[0]->starFK     : $_POST["starFK"];
    $sub->startDate   =   (empty($_POST["startDate"]))    ?   $result[0]->startDate  : $_POST["startDate"];
    $sub->life        =   (empty($_POST["life"]))         ?   $result[0]->life       : $_POST["life"];
  
    if(!($sub->Update())) 
        die(json_encode(array('status' => 500, 'message' => 'Failed to update subscription')));
    echo json_encode(array('status' => 200, 'message' => 'Subscription '. $_POST['subID'] .' correctly updated'));
?>