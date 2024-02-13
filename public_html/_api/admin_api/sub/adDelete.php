<?php

    include_once dirname(__FILE__) . '/includeSub.php';
    /**
     * Parte di controllo dei dati in input
     */
    isMethod('POST');
    /**
    * Parte di fetch dei dati e di invio al database
     
    */
    $sub = new Sub();
    $sub->subID =  $_POST['subID'];
    if(!$sub->Delete())
        die(json_encode(array('status' => 500, 'message' => 'Failed to remove subscription from database')));
    echo json_encode(array('status' => 200, 'message' => 'Subscription '. $_POST['subID'] .' correctly removed from database'));
?>