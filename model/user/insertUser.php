<?php
  include_once dirname(__FILE__) . '/../User.php';
  
  $user = new User();

  $user->email = $_POST["email"];
  $user->pwd = password_hash($_POST['pass'], PASSWORD_DEFAULT);
  $user->firstName = $_POST["firstname"];
  $user->lastName = $_POST["lastname"];
  
  if(!$user->Insert())
    die(json_encode(array('status' => 500, 'message' => 'Failed To Add User To Database!')));
?>
