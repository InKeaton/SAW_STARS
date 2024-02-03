<?php
  include_once $_SERVER['DOCUMENT_ROOT'] . '/model/Sub.php';

  $sub = new Sub();
  $sub->subID = $_POST["subID"];
  $result = $sub->Select()[0];
  
  if(!isset($result)) 
    die(json_encode(array('status' => 404, 'message' => 'Review not find in db')));
  echo json_encode($result);
?>
