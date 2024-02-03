<?php
  include_once $_SERVER['DOCUMENT_ROOT'] . '/model/SubStar.php';

  $sub = new SubStar();

  $sub->starFK = $_POST['starFK'];
  $sub->subFK = $_POST['subFK'];

  if(!$sub->Insert())
    die(json_encode(array('status' => 500, 'message' => 'Failed To Add User To Database!')));
  //echo json_encode(array('status' => 200, 'message' => 'Success!!'));
?>
