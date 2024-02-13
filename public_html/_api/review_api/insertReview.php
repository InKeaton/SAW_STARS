<?php
    
    include_once dirname(__FILE__) . '/../_utils/apiUtils.php';
    /*
     *  Parte dei controlli 
     */
    session_start();
    isMethod('POST');
    postEmptyField('note', 'vote', 'starFK');

    include_once dirname(__FILE__) . '/../_model/Review.php';
    /**
     * Parte della richiesta al DB; fetch dei dati e interazione con il DB
     */
    $rev = new Review();
    $rev->userFK = $_SESSION['uuid'];
    $rev->starFK = $_POST["starFK"];
    $rev->vote = $_POST["vote"];
    $rev->note = htmlspecialchars($_POST["note"]); 
    if(!$rev->Insert())
        die(json_encode(array('status' => 500, 'message' => 'Errore nell\'inserimento del ricordo')));
    echo json_encode(array('status' => 200, 'message' => 'Ricordo inserito con successo'));
?>