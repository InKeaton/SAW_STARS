<?php

  include_once dirname(__FILE__) . '/../User.php';  

  $user = new User();
  if(!($result = $user->SelectAll()))
    die(json_encode(array('status' => 404, 'message' => 'No user in DB')));

  echo json_encode($result);
?>