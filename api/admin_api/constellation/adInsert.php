<?php
    include_once dirname(__FILE__) . '/includeCons.php';
    /**
     * Parte di controllo dei dati inviati in input
     */
    session_start();
    isMethod('POST');
    postEmptyField('consName', 'startDate', 'endDate', 'description');
    /**
     * Parte di fetch dei dati e richiesta al DB
     */
    $cons = new Constellation();
    $cons->consName    =  $_POST['consName'];
    $cons->startDate   =  $_POST['startDate'];
    $cons->endDate     =  $_POST['endDate'];
    $cons->description = $_POST['description'];
    $cons->consImg     =  "cons.png";
    if(!$cons->Insert())
      die(json_encode(array('status' => 500, 'message' => 'Failed To Add Const To Database!')));
    echo json_encode(array('status' => 200, 'message' => 'success'));
?>