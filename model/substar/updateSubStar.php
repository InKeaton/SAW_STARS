<?php
  include_once $_SERVER['DOCUMENT_ROOT'] . '/utils/header.php';
  include_once $_SERVER['DOCUMENT_ROOT'] . '/utils/customs.php';

  validMethod('POST');

  session_start();

  //isUser();

  include_once $_SERVER['DOCUMENT_ROOT'] . '/utils/header.php';
  include_once $_SERVER['DOCUMENT_ROOT'] . '/utils/customs.php';
  include_once $_SERVER['DOCUMENT_ROOT'] . '/model/SubStar.php';
  
  $sub = new SubStar();
  $sub->substarID =  $_POST['substarID'];
  $result = $sub->Select()[0];
  if(!isset($result))
    die(json_encode(array('status' => 0, 'message' => 'Star Not Found!')));

  $sub->starFK = (empty($_POST["starFK"]))? $result->starFK : $_POST["starFK"];
  $sub->subFK = (empty($_POST["subFK"]))? $result->subFK : $_POST["subFK"];

  if(!($sub->Update())) 
    die(json_encode(array('status' => 0, 'message' => 'Failed to Update User!')));
  //echo json_encode(array('status' => 200, 'message' => 'Success!!'));
?>