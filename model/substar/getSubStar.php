<?php
  include_once $_SERVER['DOCUMENT_ROOT'] . '/model/SubStar.php';

  $sub = new SubStar();
  $sub->substarID = $_POST['substarID'];
  $result = $sub->Select()[0];
  if(!isset($result)) 
    die(json_encode(array("error" => "404", "message" => "constellation not found in DB")));
  echo json_encode($result);
?>
