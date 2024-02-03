<?php
  include_once $_SERVER['DOCUMENT_ROOT'] . '/utils/header.php';
  include_once $_SERVER['DOCUMENT_ROOT'] . '/utils/customs.php';

  validMethod('POST');

  session_start();

  // isUser(); \\ da errore se non lo commento
  include_once $_SERVER['DOCUMENT_ROOT'] . '/model/Star.php';
  
  $star = new Star();
  $star->starID = $_POST['starID'];
  $result = $star->Select()[0];
  
  if(!isset($result))
    die(json_encode(array('status' => 0, 'message' => 'Star Not Found!')));
  
  $star->consFK = (empty($_POST["consFK"]))? $result->consFK : $_POST["consFK"];
  $star->starName = (empty($_POST["starName"]))? $result->starName : $_POST["starName"];
  $star->dLY = (empty($_POST["dLY"]))? $result->dLY : $_POST["dLY"];
  $star->price = (empty($_POST["price"]))? $result->price : $_POST["price"];

  if(!($star->Update())) 
    die(json_encode(array('status' => 0, 'message' => 'Failed to Update Star!')));
  //echo json_encode(array('status' => 200, 'message' => 'Success!!'));
?>