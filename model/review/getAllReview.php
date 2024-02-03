<?php

    include_once $_SERVER['DOCUMENT_ROOT'] . '/utils/header.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/utils/customs.php';

    validMethod('POST');

    session_start();

// isUser(); \\ da errore se non lo commento

    include_once $_SERVER['DOCUMENT_ROOT'] . '/model/Review.php';
    $rev = new Review();
    if(!($result = $rev->SelectAll()))
        die(json_encode(array('status' => 404, 'message' => 'No review in DB')));
    echo json_encode($result);
?>