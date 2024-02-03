<?php
  include_once $_SERVER['DOCUMENT_ROOT'] . '/utils/header.php';
  include_once $_SERVER['DOCUMENT_ROOT'] . '/utils/customs.php';

  validMethod('POST');

  session_start();

//  isUser();


  include_once $_SERVER['DOCUMENT_ROOT'] . '/model/Sub.php';
  
  $sub = new Sub();
  $sub->subID = $_POST["subID"];
  $result = $sub->Select()[0];

  if(!isset($result))
    die(json_encode(array('status' => 0, 'message' => 'Star Not Found!')));

  $sub->subName = (empty($_POST["subName"]))? $result->subName : $_POST["subName"];
  $sub->startDate = (empty($_POST["startDate"]))? $result->startDate : $_POST["startDate"];
  $sub->life = (empty($_POST["life"]))? $result->life : $_POST["life"];
  $sub->userFK = (empty($_POST["userFK"]))? $result->userFK : $_POST["userFK"];

  if(!($sub->Update())) 
    die(json_encode(array('status' => 0, 'message' => 'Failed to Update User!')));
  //echo json_encode(array('status' => 200, 'message' => 'Success!!'));
?>