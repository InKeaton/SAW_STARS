<?php

  include_once dirname(__FILE__) . '/../Star.php';
    
  $star = new Star();

  if(!($result = $star->SelectAll()))
    die(json_encode(array('status' => 404, 'message' => 'No star in DB')));
  echo json_encode($result);
?>