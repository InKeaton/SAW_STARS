<?php
    include_once dirname(__FILE__) . '/includeSub.php';
    /**
     * Parte di controllo dei dati in input
     */
    isMethod('POST');
    postEmptyField('userFK', 'starFK');
    /**
    * Parte di fetch dei dati e di invio al db
    */
        
    $sub = new Sub();
    $sub->subID = $_POST['subID'];
    
    if(!$sub->Delete())
      die(json_encode(array('status' => 500, 'message' => 'Failed To Add SUB To Database!')));
    echo json_encode(array('status' => 200, 'message' => 'Success!!'));
?>