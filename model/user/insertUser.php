<?php
  include_once $_SERVER['DOCUMENT_ROOT'] . '/model/User.php';
  
  $user = new User();

  $user->role = $_POST["role"];
  $user->email = $_POST["email"];
  $user->pwd = password_hash($_POST['pwd'], PASSWORD_DEFAULT);
  $user->firstName = $_POST["firstName"];
  $user->lastName = $_POST["lastName"];
  $user->img = $_POST["img"];
  
  if(!$user->Insert())
    die(json_encode(array('status' => 500, 'message' => 'Failed To Add User To Database!')));
  //echo json_encode(array('status' => 200, 'message' => 'Success!!'));
?>
