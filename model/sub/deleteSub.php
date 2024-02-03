<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/model/Sub.php';
    $sub = new Sub();

    $sub->subID = $_POST['subID'];
    if(!$sub->Delete())
      die(json_encode(array('status' => 500, 'message' => 'Failed To Add SUB To Database!')));
    //echo json_encode(array('status' => 200, 'message' => 'Success!!'));
?>