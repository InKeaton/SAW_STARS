<?php
    include_once dirname(__FILE__) . '/includeSub.php';
    /**
     * Parte di controllo dei dati in input
     */
    session_start();
    isMethod('POST');
    postEmptyField('starFK', 'life');
    /**
    * Parte di fetch dei dati e di invio al db
    */
    $sub = new Sub();

    $sub->userFK = $_SESSION["uuid"];
    $sub->starFK = $_POST["starFK"];
    $sub->life   = $_POST["life"];
    
    if(!$sub->Insert())
      die(json_encode(array('status' => 500, 'message' => 'Failed To Add User To Database!')));
    echo json_encode(array('status' => 200, 'message' => 'Success!!'));    
?>