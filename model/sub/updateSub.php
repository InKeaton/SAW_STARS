<?php
  include_once $_SERVER['DOCUMENT_ROOT'] . '/model/Sub.php';
  
  $sub = new Sub();
  $sub->subID = $_POST["subID"];
  $result = $sub->Select()[0];

  if(!isset($result))
    die(json_encode(array('status' => 0, 'message' => 'Star Not Found!')));

  $sub->subName = $_POST["subName"];
  $sub->startDate =  $_POST["startDate"];
  $sub->life = $_POST["life"];
  $sub->userFK = $_POST["userFK"];

  if(!($sub->Update())) 
    die(json_encode(array('status' => 0, 'message' => 'Failed to Update User!')));
  //echo json_encode(array('status' => 200, 'message' => 'Success!!'));
?>