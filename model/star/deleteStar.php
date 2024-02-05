<?php
    include_once dirname(__FILE__) . '/../Star.php';
    
    $star = new Star();
    $star->starID = $_POST['starID'];

    if(!$star->Delete())
      die(json_encode(array('status' => 500, 'message' => 'Failed To Add Const To Database!')));
    //echo json_encode(array('status' => 200, 'message' => 'Success!!'));
?>