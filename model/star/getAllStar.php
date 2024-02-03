<?php
  include_once $_SERVER['DOCUMENT_ROOT'] . '/utils/header.php';
  include_once $_SERVER['DOCUMENT_ROOT'] . '/utils/customs.php';
  validMethod('POST');

  session_start();

  // isUser(); \\ da errore se non lo commento
  
  include_once $_SERVER['DOCUMENT_ROOT'] . '/model/Star.php';

  $star = new Star();

  if(!($result = $star->SelectAll()))
    die(json_encode(array('status' => 404, 'message' => 'No star in DB')));

  echo json_encode($result);
?>