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
    if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
        die(json_encode(array('status' => 100, 'message' => 'L\'email non è in formato corretto' )));
    
    if(strlen($_POST['pass']) < 10)
        die(json_encode(array('status' => 100, 'message' => 'La password deve essere lunga almeno 10 caratteri' )));
        
    if($_POST['pass'] !== $_POST['confirm'] )
        die(json_encode(array('status' => 100, 'message' => 'La password e la conferma devono essere uguali' )));


    /*
     * Fetch dei dati ed invio dei dati al database
     */
    include_once dirname(__FILE__) . '/../_model/User.php';
    
    $user = new User();
    $user->email = $_POST["email"];

    if($user->SelectEmail())
        die(json_encode(array('status' => 500, 'message' => 'L\'email è già registrata, utilizzarne una diversa')));

    $user->pwd = password_hash($_POST['pass'], PASSWORD_DEFAULT);
    $user->firstName = htmlspecialchars($_POST["firstname"]);
    $user->lastName = htmlspecialchars($_POST["lastname"]);
    
    if(!$user->Insert())
        die(json_encode(array('status' => 500, 'message' => 'Errore nell\'inserimento nel database')));
    echo json_encode(array('status' => 200, 'message' =>'Registrazione avvenuto con successo. Benvenuto!'));
?>