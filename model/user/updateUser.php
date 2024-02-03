<?php
  include_once $_SERVER['DOCUMENT_ROOT'] . '/utils/header.php';
  include_once $_SERVER['DOCUMENT_ROOT'] . '/utils/customs.php';

  validMethod('POST');

  session_start();

// isUser();

  include_once $_SERVER['DOCUMENT_ROOT'] . '/model/User.php';
  
  $user = new User();

  validEmailAndPwd();
  validInput($_POST['pwd'] !== $_POST['pwd_confirm'], "Passwords Doesn't Match!");

 
  $user->userID = $_POST["userID"];
  $result = $user->Select()[0];
  if(!isset($result))
    die(json_encode(array('status' => 0, 'message' => 'User Not Found!')));
  
  $user->role = (empty($_POST["role"]))? $result->role : $_POST["role"];
  $user->email = (empty($_POST["email"]))? $result->email : $_POST["email"];
  $user->pwd = (empty($_POST["pwd"]))? $result->pwd : $_POST["pwd"];
  $user->firstName = (empty($_POST["firstName"]))? $result->firstName : $_POST["firstName"];
  $user->lastName = (empty($_POST["lastName"]))? $result->lastName : $_POST["lastName"];
  $user->img = (empty($_POST["img"]))? $result->img : $_POST["img"];
  $user->createDate = (empty($_POST["createDate"]))? $result->createDate : $_POST["createDate"];

  if(!($user->Update())) 
    die(json_encode(array('status' => 0, 'message' => 'Failed to Update User!')));
  //echo json_encode(array('status' => 200, 'message' => 'Success!!'));
?>