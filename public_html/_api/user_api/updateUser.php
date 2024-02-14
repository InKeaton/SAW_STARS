<?php
    include_once dirname(__FILE__) . '/includeUser.php';
    /**
     * Parte di controllo dei dati
     */
    session_start();
    isLog();
    isMethod('POST');
    postEmptyField('email', 'firstname', 'lastname');

    if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
        die(json_encode(array('status' => 100, 'message' => 'La sintassi dell\'email non è corretta' )));
    
    $_POST['userID'] = $_SESSION['uuid'];
    /**
     * Parte di fetch dei dati e di comunicazione con il database
     */

    $user = new User();
    
    $user->userID = $_POST["userID"];
    $result = $user->Select();
    
    if(!isset($result))
        die(json_encode(array('status' => 0, 'message' => 'Utente non trovato nel database')));

    $user->email = $_POST["email"];
    if($user->SelectEmail() && $result[0]->email != $user->email)
        die(json_encode(array('status' => 500, 'message' => 'L\'email è già registrata, utilizzarne una diversa')));

    $user->role         = $result[0]->role;
    $user->email        = (empty($_POST["email"]))?      $result[0]->email      : htmlspecialchars($_POST["email"]);
    $user->pwd          = $result[0]->pwd;
    $user->firstName    = (empty($_POST["firstname"]))?  $result[0]->firstName  : htmlspecialchars($_POST["firstname"]);
    $user->lastName     = (empty($_POST["lastname"]))?   $result[0]->lastName   : htmlspecialchars($_POST["lastname"]);
    $user->createDate   = $result[0]->createDate;

    if(!($user->Update())) 
        die(json_encode(array('status' => 0, 'message' => 'Errore nell\'aggiornamento dei dati dell\'utente')));
    echo json_encode(array('status' => 200, 'message' => 'Aggiornamento del profilo avvenuto con successo'));
?>
