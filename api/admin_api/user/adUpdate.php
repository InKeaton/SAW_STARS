<?php
    include_once dirname(__FILE__) . '/includeUser.php';
    /**
     * Parte di controllo dei dati mandati in input
     */
    session_start();
    isLog();
    isMethod('POST');
    postEmptyField('email', 'firstname', 'lastname', 'createDate', 'userID', 'pass');

    /**
     * Parte di fetch dei dati e invio dei dati al database
     */
    $user = new User();

    $user->userID = $_POST["userID"];
    $result = $user->Select()[0];
    if(!isset($result))
        die(json_encode(array('status' => 0, 'message' => 'User Not Found!')));
    
    $user->role = (empty($_POST["role"]))? $result->role : $_POST["role"];
    $user->email = (empty($_POST["email"]))? $result->email : $_POST["email"];
    $user->pwd = (empty($_POST["pass"]))? $result->pwd : $_POST["pass"];
    $user->firstName = (empty($_POST["firstname"]))? $result->firstName : $_POST["firstname"];
    $user->lastName = (empty($_POST["lastname"]))? $result->lastName : $_POST["lastname"];
    $user->img = (empty($_POST["img"]))? $result->img : $_POST["img"];
    $user->createDate = (empty($_POST["createDate"]))? $result->createDate : $_POST["createDate"];
    
    if(!($user->Update())) 
        die(json_encode(array('status' => 0, 'message' => 'Failed to Update User!')));
?> 