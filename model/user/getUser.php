<?php
  include_once $_SERVER['DOCUMENT_ROOT'] . '/chiron-server-main/model/User.php';

  $user = new User();
  $user->userID = $_POST['userID'];
  $result = $user->Select()[0];
  if(!isset($result)) 
    die(json_encode(array('status' => 404, 'message' => 'User not find in db')));
  echo json_encode($result);
?>
