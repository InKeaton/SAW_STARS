<?php
    
    include_once dirname(__FILE__) . '/includeUser.php';
    /**
     * Parte di controllo dei dati passati in input
     */
    isMethod('POST');
    postEmptyField('email', 'pass', 'firstname', 'lastname');
    if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
        die(json_encode(array('status' => 100, 'message' => 'Sintassi email non corretta' )));
        
    if((strlen($_POST['pass'])<10)) 
        die(json_encode(array('status' => 0, 'message' => 'La password deve avere almeno 10 caratteri')));
    
    /**
     * Fetch dei dati ed invio dei dati al database
     */

    $user = new User();
    $user->email =      $_POST["email"];
    $user->pwd =        password_hash($_POST['pass'], PASSWORD_DEFAULT);
    $user->firstName =  htmlspecialchars($_POST["firstname"]);
    $user->lastName =   htmlspecialchars($_POST["lastname"]);
    $user->role     =   (isset($_POST["role"]))? 1: 0;
    
    if(!$user->Insert())
        die(json_encode(array('status' => 500, 'message' => 'Failed to add user to database!')));
    echo json_encode(array('status' => 200, 'message' => 'User '. $_POST['email'] .' correctly added to database'));
?>
