<?php
    
    include_once dirname(__FILE__) . '/includeUser.php';
    /**
     * Parte di controllo dei dati passati in input
     */
    isMethod('POST');
    postEmptyField('email', 'pass', 'firstname', 'lastname');
    /**
     * Fetch dei dati ed invio dei dati al database
     */
    include_once dirname(__FILE__) . '/../_model/User.php';
    $user = new User();
    $user->email =      $_POST["email"];
    $user->pwd =        password_hash($_POST['pass'], PASSWORD_DEFAULT);
    $user->firstName =  $_POST["firstname"];
    $user->lastName =   $_POST["lastname"];
    $user->role     =   (isset($_POST["role"]))? 1: 0;
    
    if(!$user->Insert())
        die(json_encode(array('status' => 500, 'message' => 'Failed To Add User To Database!')));
    echo json_encode(array('status' => 200, 'message' => 'Success!!', 'role' => $_POST["role"]));
?>