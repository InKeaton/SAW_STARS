<?php
    /*   
     * API che serve per la gestione della fase di login dell'utente.
     * Viene controllato che il metodo con cui è stata effettuata la richiesta sia un metodo POST.
     * Viene controllato che i campi email e pass siano presenti, e non siano vuoti, all'interno della richiesta.
     * Viene fatta la select con l'email passata dal client
     * Viene verificato che la riga recuperata dal server abbia l'hash corrispondente alla password passata dal client.
     * Se tutte le operazioni descritte prima vanno ha buon fine si manda al client come risposta una 200 iniziando una nuova sessione
    */
    include_once dirname(__FILE__) . '/../../utils/apiUtils.php';

    isMethod('POST');
    postEmptyField('email', 'pass');

    include_once dirname(__FILE__) . '/../../model/user/getUser.php';
    
    if(!password_verify($_POST['pass'], $result->pwd)) 
        die(json_encode(array('status' => 404, 'message' => 'Password must be the same')));

    session_start();
    $_SESSION['uuid'] = $result->userID;
    $_SESSION['role'] = $result->role;
    echo json_encode(array('status'=>200, 'message' => $result->userID));
?>