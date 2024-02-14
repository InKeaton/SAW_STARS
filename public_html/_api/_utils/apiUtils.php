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
            die(json_encode(array('status' => 300, 'message' => 'Il metodo richiesto è post non get')));
    }

    /**
     * Controlla che tutti i campi di cui si necessita per poter eseguire l'API siano effettivamente
     * esistenti e settati.
     */
    function postEmptyField(...$fields) {
        foreach ($fields as $f) {
            if(empty($_POST[$f]))
                die(json_encode(array('status' => 100, 'message' => 'Ci sono dei valori mancanti')));  
        }
    }

    /**
     * Controlla se la sessione è attiva
     */
    function isLog() {
        if(!isset($_SESSION["uuid"])) 
            die(json_encode(array('status'=>100, 'message'=>'Solo gli utenti autenticati possono accedere')));
    }

    /**
     * Controlla se la sessione è attiva
     */
    function isAdmin() {
        if(!isset($_SESSION['uuid']) or $_SESSION['role']!==1)
            die(json_encode(array('status'=>100, 'message'=>'Solo gli utenti admin possono accedere')));
    }
?>
