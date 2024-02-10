<?php

    include_once dirname(__FILE__) . '/includeUser.php';
    /**
     * Parte di controllo dei dati in input
     */
    session_start();
    isLog();
    isMethod('POST');
    /**
    * Parte di fetch dei dati e di invio al database
     
    */
    $user = new User();
    $user->userID =  $_POST['userID'];
    if(!$user->Delete())
      die(json_encode(array('status' => 500, 'message' => 'Failed To Add User To Database!')));
    echo json_encode(array('status' => 200, 'message' => 'success'));
?>