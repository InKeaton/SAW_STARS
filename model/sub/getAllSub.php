<?php
  include_once dirname(__FILE__) . '/../Sub.php';
    

  $sub = new Sub();
  if(!($result = $sub->SelectAll()))
    die(json_encode(array('status' => 404, 'message' => 'No user in DB')));

  echo json_encode($result);
?>