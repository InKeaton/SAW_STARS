<?php
    include_once dirname(__FILE__) . '/includeCons.php';
    /**
     * Parte di controllo dei dati inviati in input
     */
    isMethod('POST');
    postEmptyField('consID');
    /**
     * Parte di fetch dei dati e richiesta al DB
     */
    $cons = new Constellation();
    $cons->consID = $_POST['consID'];

    if(!$cons->Delete())
      die(json_encode(array('status' => 500, 'message' => 'Failed To Add Const To Database!')));
    echo json_encode(array('status' => 200, 'message' => 'success'));
?>