<?php
  include_once dirname(__FILE__) . '/../Sub.php';
    
  
  $sub = new Sub();
  $sub->subID = $_POST["subID"];
  $result = $sub->Select()[0];

  if(!isset($result))
    die(json_encode(array('status' => 0, 'message' => 'Star Not Found!')));

  $sub->starFK = $_POST["starFK"];
  $sub->startDate =  $_POST["startDate"];
  $sub->life = $_POST["life"];
  $sub->userFK = $_POST["userFK"];

  if(!($sub->Update())) 
    die(json_encode(array('status' => 0, 'message' => 'Failed to Update User!')));
  //echo json_encode(array('status' => 200, 'message' => 'Success!!'));
?>