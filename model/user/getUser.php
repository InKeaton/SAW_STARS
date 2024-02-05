<?php
  include_once dirname(__FILE__) . '/../User.php';

  $user = new User();
  $user->email = $_POST['email'];
  $result = $user->SelectEmail()[0];
  if(!isset($result)) 
    die(json_encode(array('status' => 404, 'message' => 'User not find in db')));

?>
