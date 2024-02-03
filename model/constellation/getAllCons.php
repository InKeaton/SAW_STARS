<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/utils/header.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/utils/customs.php';

    validMethod('POST');

    session_start();

  // isUser(); \\ da errore se non lo commento

    include_once $_SERVER['DOCUMENT_ROOT'] . '/model/Constellation.php';

    $cons = new Constellation();
    if(!($result = $cons->SelectAll()))
        die(json_encode(array('status' => 404, 'message' => 'No const in DB')));

    echo json_encode($result);
?>