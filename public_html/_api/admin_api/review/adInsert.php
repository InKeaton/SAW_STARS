<?php
    include_once dirname(__FILE__) . '/includeReview.php';
    /**
     * Parte di controllo dei dati inviati in input
     */
    isMethod('POST');
    postEmptyField('starFK', 'userFK', 'vote', 'note', 'revDate');
    /**
     * Parte di fetch dei dati e richiesta al DB
     */
    $rev = new Review();
    $rev->starFK    =   $_POST['starFK'];
    $rev->userFK    =   $_POST['userFK'];
    $rev->vote      =   $_POST['vote'];
    $rev->note      =   $_POST['note'];
    $rev->revDate   =   $_POST['revDate'];

    if(!$rev->Insert())
      die(json_encode(array('status' => 500, 'message' => 'Failed To Add Const To Database!')));
    echo json_encode(array('status' => 200, 'message' => 'success'));
?>