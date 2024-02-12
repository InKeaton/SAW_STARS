<?php
    include_once dirname(__FILE__) . '/includeUser.php';
    /**
     * Parte di controllo dei dati mandati in input
     */
    isMethod('POST');
    postEmptyField('email', 'firstname', 'lastname', 'createDate', 'userID', 'pass');

    /**
     * Parte di fetch dei dati e invio dei dati al database
     */
    $user = new User();

    $user->userID = $_POST["userID"];
    $result = $user->Select();
    if(count($result) === 0)
        die(json_encode(array('status' => 0, 'message' => 'User Not Found!')));
    
    $user->role         =   (isset($_POST["role"]))         ? 1                      :   0;
    $user->email        =   (empty($_POST["email"]))        ? $result[0]->email      :   $_POST["email"];
    $user->pwd          =   (empty($_POST["pass"]))         ? $result[0]->pwd        :   $_POST["pass"];
    $user->firstName    =   (empty($_POST["firstname"]))    ? $result[0]->firstName  :   $_POST["firstname"];
    $user->lastName     =   (empty($_POST["lastname"]))     ? $result[0]->lastName   :   $_POST["lastname"];
    $user->img          =   (empty($_POST["img"]))          ? $result[0]->img        :   $_POST["img"];
    $user->createDate   =   (empty($_POST["createDate"]))   ? $result[0]->createDate :   $_POST["createDate"];
    
    if(!($user->Update())) 
        die(json_encode(array('status' => 0, 'message' => 'Failed to Update User!')));
    json_encode(array('status' => 200, 'message' => 'Success!!'));
?> 
