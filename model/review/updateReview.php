<?php

  include_once dirname(__FILE__) . '/../Review.php';
    
  $rev = new Review();
  $rev->reviewID = $_POST['reviewID'];
  $result = $rev->Select()[0];
  
  if(!isset($result))
    die(json_encode(array('status' => 0, 'message' => 'Star Not Found!')));
  
  $rev->starFK =  $_POST["starFK"];
  $rev->userFK =  $_POST["userFK"];
  $rev->vote =  $_POST["vote"];
  $rev->note =  $_POST["note"];
  $rev->revDate =  $_POST["revDate"];

  if(!($rev->Update())) 
    die(json_encode(array('status' => 0, 'message' => 'Failed to Update Star!')));
  //echo json_encode(array('status' => 200, 'message' => 'Success!!'));
?>