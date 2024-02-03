<?php
  include_once $_SERVER['DOCUMENT_ROOT'] . '/model/Constellation.php';

  $cons = new Constellation();
  
  $cons->consName = $_POST["consName"];
  $cons->startDate = $_POST["startDate"];
  $cons->endDate = $_POST["endDate"];
  $cons->description = $_POST["description"];
  $cons->consImg = $_POST["consImg"];
  
  if(!$cons->Insert())
    die(json_encode(array('status' => 500, 'message' => 'Failed To Add cons To Database!')));
  //echo json_encode(array('status' => 200, 'message' => 'Success!!'));
?>
