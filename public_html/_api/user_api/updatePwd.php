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
        die(json_encode(array('status' => 100, 'message' => 'Password must have at least 10 characters' )));
    
    if($_POST['confirm'] !== $_POST['pass'])
        die(json_encode(array('status' => 100, 'message' => 'Password and confirm field must have the same value')));
    
    /**
     * Parte di fetch dei dati e di comunicazione con il database
    */

    $user = new User();

    $user->userID = $_POST["userID"];
    $result = $user->Select();
    if(count($result) === 0)
        die(json_encode(array('status' => 0, 'message' => 'User Not Found!')));

    if(!password_verify($_POST['oldPass'], $result[0]->pwd)) 
        die(json_encode(array('status' => 404, 'message' => 'Remembre the old password')));

    $user->role         = (empty($_POST["role"]))?       $result[0]->role       : $_POST["role"];
    $user->email        = (empty($_POST["email"]))?      $result[0]->email      : $_POST["email"];
    $user->pwd          = password_hash($_POST['pass'], PASSWORD_DEFAULT);
    $user->firstName    = (empty($_POST["firstname"]))?  $result[0]->firstName  : $_POST["firstname"];
    $user->lastName     = (empty($_POST["lastname"]))?   $result[0]->lastName   : $_POST["lastname"];
    $user->img          = (empty($_POST["img"]))?        $result[0]->img        : $_POST["img"];
    $user->createDate   = (empty($_POST["createDate"]))? $result[0]->createDate : $_POST["createDate"];

    if(!($user->Update())) 
        die(json_encode(array('status' => 0, 'message' => 'Failed to Update User!')));
    echo json_encode(array('status' => 200, 'message' => 'Success!!'));
?>
