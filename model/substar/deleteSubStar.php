<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/model/SubStar.php';
    
    $sub = new SubStar();
    $sub->substarID = $_POST['substarID'];

    if(!$sub->Delete())
      die(json_encode(array('status' => 500, 'message' => 'Failed To Add SUB To Database!')));
    //echo json_encode(array('status' => 200, 'message' => 'Success!!'));
?>