<?php
    include_once dirname(__FILE__) . '/includeReview.php';
    /**
     * Parte di controllo dei dati inviati in input
     */
    isMethod('POST');
    postEmptyField('reviewID');
    /**
     * Parte di fetch dei dati e richiesta al DB
     */
    $rev = new Review();
    $rev->reviewID = $_POST['reviewID'];

    if(!$rev->Delete())
      die(json_encode(array('status' => 500, 'message' => 'Failed To Add Const To Database!')));
    echo json_encode(array('status' => 200, 'message' => 'success'));
?>