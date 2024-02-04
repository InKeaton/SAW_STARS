<?php
  include_once $_SERVER['DOCUMENT_ROOT'] . '/model/Star.php';
  
  $star = new Star();
  $star->starID = $_POST['starID'];
  $result = $star->Select()[0];
  
  if(!isset($result))
    die(json_encode(array('status' => 0, 'message' => 'Star Not Found!')));
  
  $star->consFK =  $_POST["consFK"];
  $star->starName =  $_POST["starName"];
  $star->dLY =  $_POST["dLY"];
  $star->price =  $_POST["price"];

  if(!($star->Update())) 
    die(json_encode(array('status' => 0, 'message' => 'Failed to Update Star!')));
  //echo json_encode(array('status' => 200, 'message' => 'Success!!'));
?>