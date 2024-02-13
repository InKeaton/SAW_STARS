<?php
    include_once dirname(__FILE__) . '/includeSub.php';
    /**
     * Parte di controllo dei dati in input
     */
    session_start();
    isMethod('POST');
    postEmptyField('starFK');
    /**
    * Parte di fetch dei dati e di invio al db
    */
        
    $sub = new Sub();
    $sub->starFK = $_POST['starFK'];
    $sub->userFK = $_SESSION['uuid'];
    
    if(!$sub->DeleteSubUserStar())
      die(json_encode(array('status' => 500, 'message' => 'Errore nella cancellazione dell\'abbonamento')));
    echo json_encode(array('status' => 200, 'message' => 'Abbonamento cancellato con successo'));
?>