<?php
  include_once dirname(__FILE__) . '/../Sub.php';
    

  $sub = new Sub();

  $sub->userFK = $_POST["userFK"];
  $sub->starFK = $_POST["starFK"];
  $sub->life = $_POST["life"];
  
  if(!$sub->Insert())
    die(json_encode(array('status' => 500, 'message' => 'Failed To Add User To Database!')));
  //echo json_encode(array('status' => 200, 'message' => 'Success!!'));
?>
