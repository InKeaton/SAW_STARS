<?php
    /*   
     * API che serve per la gestione della fase di login dell'utente.
     * Viene controllato che il metodo con cui è stata effettuata la richiesta sia un metodo POST.
     * Viene controllato che i campi email e pass siano presenti, e non siano vuoti, all'interno della richiesta.
     * Viene fatta la select con l'email passata dal client
     * Viene verificato che la riga recuperata dal server abbia l'hash corrispondente alla password passata dal client.
     * Se tutte le operazioni descritte prima vanno ha buon fine si manda al client come risposta una 200 iniziando una nuova sessione
    */
    include_once dirname(__FILE__) . '/../_utils/apiUtils.php';
    /**
     *  Parte di controllo degli input
     */
    isMethod('POST');
    postEmptyField('email', 'pass');

    include_once dirname(__FILE__) . '/../_model/User.php';
    /*
    *   Parte della fetch dei dati e della richiesta con il database 
    */
    $user = new User();
    $user->email = $_POST['email'];
    $result = $user->SelectEmail();
    if(count($result)===0) 
      die(json_encode(array('status' => 404, 'message' => 'User not find in db')));
  
    if(!password_verify($_POST['pass'], $result[0]->pwd)) 
        die(json_encode(array('status' => 404, 'message' => 'Password must be the same')));

    session_start();
    $_SESSION['uuid'] = $result[0]->userID;
    $_SESSION['role'] = $result[0]->role;
    echo json_encode(array('status'=>200, 'message' => $result[0]->userID));
?>