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
        die(json_encode(array('status' => 100, 'message' => 'Email syntax is not correct' )));
    
    $_POST['userID'] = $_SESSION['uuid'];
    /**
     * Parte di fetch dei dati e di comunicazione con il database
     */

    $user = new User();
    
    $user->userID = $_POST["userID"];
    $result = $user->Select();
    if(!isset($result))
        die(json_encode(array('status' => 0, 'message' => 'User Not Found!')));
    
    $user->role         = (empty($_POST["role"]))?       $result[0]->role       : $_POST["role"];
    $user->email        = (empty($_POST["email"]))?      $result[0]->email      : $_POST["email"];
    $user->pwd          = (empty($_POST["pass"]))?       $result[0]->pwd        : $_POST["pwd"];
    $user->firstName    = (empty($_POST["firstname"]))?  $result[0]->firstName  : $_POST["firstname"];
    $user->lastName     = (empty($_POST["lastname"]))?   $result[0]->lastName   : $_POST["lastname"];
    $user->img          = (empty($_POST["img"]))?        $result[0]->img        : $_POST["img"];
    $user->createDate   = (empty($_POST["createDate"]))? $result[0]->createDate : $_POST["createDate"];

    if(!($user->Update())) 
        die(json_encode(array('status' => 0, 'message' => 'Failed to Update User!')));
    echo json_encode(array('status' => 200, 'message' => 'Success!!'));
?>
