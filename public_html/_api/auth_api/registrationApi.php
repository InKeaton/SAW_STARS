<?php
    /**
     * API che serve per la registrazione dell'utente al db.
     * Se i campi richiesti non sono vuoti e esistono allora verrà verificato che il campo pass sia uguale al campo confirm.
     * Se è così si ritorna come risposta una 200.
     */
    
    include_once dirname(__FILE__) . '/../_utils/apiUtils.php';
    /**
     * Parte di controllo dei dati passati in input
     */
    isMethod('POST');
    postEmptyField('email', 'pass', 'confirm', 'firstname', 'lastname');

    if($_POST['pass'] !== $_POST['confirm'])
        die(json_encode(array('status' => 100, 'message' => 'Confirm password must be equal to password' )));
    /**
     * Fetch dei dati ed invio dei dati al database
     */
    include_once dirname(__FILE__) . '/../_model/User.php';
    $user = new User();
    $user->email = $_POST["email"];
    $user->pwd = password_hash($_POST['pass'], PASSWORD_DEFAULT);
    $user->firstName = $_POST["firstname"];
    $user->lastName = $_POST["lastname"];
    
    if(!$user->Insert())
        die(json_encode(array('status' => 500, 'message' => 'Failed To Add User To Database!')));
    echo json_encode(array('status' => 200, 'message' => 'Success!!'));
?>