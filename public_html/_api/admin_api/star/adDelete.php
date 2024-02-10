<?php
    include_once dirname(__FILE__) . '/includeStar.php';
    /**
     * Parte di controllo dei dati inviati in input
     */
    isMethod('POST');
    postEmptyField('starID');
    /**
     * Parte di fetch dei dati e richiesta al DB
     */
    $star = new Star();
    $star->starID = $_POST['starID'];

    if(!$star->Delete())
      die(json_encode(array('status' => 500, 'message' => 'Failed To Add Const To Database!')));
    echo json_encode(array('status' => 200, 'message' => 'success'));
?>