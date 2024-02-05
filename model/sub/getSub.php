<?php
  include_once dirname(__FILE__) . '/../Sub.php';
    

  $sub = new Sub();
  $sub->subID = $_POST["subID"];
  $result = $sub->SelectUserSub()[0];
  
  if(!isset($result)) 
    die(json_encode(array('status' => 404, 'message' => 'Review not find in db')));
  echo json_encode($result);
?>
