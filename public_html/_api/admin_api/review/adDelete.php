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
      die(json_encode(array('status' => 500, 'message' => 'Failed to remove memory from database')));
    echo json_encode(array('status' => 200, 'message' => 'Memory '. $_POST['reviewID'] .' correctly removed from database'));
?>