<?php
    include_once dirname(__FILE__) . '/includeUser.php';
    /**
     * Parte di controllo dei dati
     */
    session_start();
    isLog();
    isMethod('POST');
    postEmptyField('confirm', 'pass', 'oldPass');
    $_POST['userID'] = $_SESSION['uuid'];

    if(strlen($_POST['pass']) < 10)
        die(json_encode(array('status' => 100, 'message' => 'La password deve essere lunga almeno 10 caratteri' )));
    
    if($_POST['confirm'] !== $_POST['pass'])
        die(json_encode(array('status' => 100, 'message' => 'La password e la conferma devono essere uguali')));
    
    /**
     * Parte di fetch dei dati e di comunicazione con il database
    */

    $user = new User();

    $user->userID = $_POST["userID"];
    $result = $user->Select();
    if(count($result) === 0)
        die(json_encode(array('status' => 0, 'message' => 'Utente non trovato nel database')));

    if(!password_verify($_POST['oldPass'], $result[0]->pwd)) 
        die(json_encode(array('status' => 404, 'message' => 'Password vecchia non corretta')));

    $user->role         = $result[0]->role;
    $user->email        = $result[0]->email;
    $user->pwd          = password_hash($_POST['pass'], PASSWORD_DEFAULT);
    $user->firstName    = $result[0]->firstName;
    $user->lastName     = $result[0]->lastName;
    $user->createDate   = $result[0]->createDate;

    if(!($user->Update())) 
        die(json_encode(array('status' => 0, 'message' => 'Errore nell\'aggiornamento della password dell\'utente')));
    echo json_encode(array('status' => 200, 'message' => 'Aggiornamento della password avvenuto con successo'));
?>
