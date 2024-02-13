<?php
    include_once dirname(__FILE__) . '/includeReview.php';
    /**
     * Parte di controllo dei dati inviati in input
     */
    isMethod('POST');
    postEmptyField('starFK', 'userFK', 'vote', 'note', 'revDate');
    if(strlen($_POST['note']) > 1000)
        die(json_encode(array('status' => 500, 'message' => 'La recensione deve avere meno di 1000 caratteri')));
    /**
     * Parte di fetch dei dati e richiesta al DB
     */
    $rev = new Review();
    $rev->starFK    =   $_POST['starFK'];
    $rev->userFK    =   $_POST['userFK'];
    $rev->vote      =   $_POST['vote'];
    $rev->note      =   htmlspecialchars($_POST['note']);
    $rev->revDate   =   $_POST['revDate'];

    if(!$rev->Insert())
        die(json_encode(array('status' => 500, 'message' => 'Failed to add memory to database!')));
    echo json_encode(array('status' => 200, 'message' => 'Memory correctly added to database'));
?>
