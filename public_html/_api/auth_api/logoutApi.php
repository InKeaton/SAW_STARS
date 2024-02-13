<?php
    /**
     * Controlla che l'utente sia sia già loggato, e che quindi presenti già delle variabili di sessione.
     * Se è così viene distrutta le sessione presente e viene restituita come risposta una 200.
     */
    session_start();
    if(!isset($_SESSION["uuid"])) 
        echo json_encode(array('status'=>100, 'message'=>'You need to be logged to logout'));
    session_destroy();
    echo json_encode(array('status'=>200, 'message'=>'Logout avvenuto con successo. Arrivederci!'));
?>