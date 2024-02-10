<?php
    /**
     * File con delle funzioni che ritornano molto spesso utili all'interno delle varie API
     */
    
    /**
     * Serve a verificare che il metodo passato sia effettivamente quello richiesto dal servizio 
     * per funzionare
     */
    function isMethod($method) {
        if($_SERVER['REQUEST_METHOD'] !== 'POST') 
            die(json_encode(array('status' => 300, 'message' => 'Un Correct Method')));
    }

    /**
     * Controlla che tutti i campi di cui si necessita per poter eseguire l'API siano effettivamente
     * esistenti e settati.
     */
    function postEmptyField(...$fields) {
        foreach ($fields as $f) {
            if(empty($_POST[$f]))
                die(json_encode(array('status' => 100, 'message' => 'Insert value in all the field')));  
        }
    }

    /**
     * Controlla se la sessione è attiva
     */
    function isLog() {
        if(!isset($_SESSION["uuid"])) 
            echo json_encode(array('status'=>100, 'message'=>'You don"t have a sessione here'));
    }
?>