<?php
  include_once $_SERVER['DOCUMENT_ROOT'] . '/model/SubStar.php';

  $sub = new SubStar();
  if(!($result = $sub->SelectAll()))
    die(json_encode(array('status' => 404, 'message' => 'No user in DB')));

  echo json_encode($result);
?>