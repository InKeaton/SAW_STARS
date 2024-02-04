<?php
  include_once $_SERVER['DOCUMENT_ROOT'] . '/model/Sub.php';

  $sub = new Sub();
  if(!($result = $sub->SelectAll()))
    die(json_encode(array('status' => 404, 'message' => 'No user in DB')));

  echo json_encode($result);
?>