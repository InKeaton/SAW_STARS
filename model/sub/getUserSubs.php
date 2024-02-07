<?php
  include_once dirname(__FILE__) . '/../Sub.php';

  $sub = new Sub();
  $sub->userFK = $_POST["userFK"];
  $result = $sub->SelectUserSubs();
  
  if(!isset($result)) 
    die(json_encode(array('status' => 404, 'message' => 'Review not find in db')));
  echo json_encode($result);
?>