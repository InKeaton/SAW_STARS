<?php
    include_once dirname(__FILE__) . '/includeUser.php';
    /**
     * Parte di controllo dei dati passati in input
     */
    isMethod('POST');
    postEmptyField('userFK');
    /**
     * Parte di fetch dei dati e di invio dei dati al database
     */
    $sub = new Sub();
    $sub->userFK = $_POST["userFK"];
    $result = $sub->SelectUserSub();
    
    if(!isset($result)) 
      die(json_encode(array('status' => 404, 'message' => 'Review not find in db')));
    echo json_encode($result);
?>