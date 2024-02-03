<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/model/Review.php';
    $rev = new Review();
    $rev->reviewID = $_POST['reviewID'];
    if(!$rev->Delete())
      die(json_encode(array('status' => 500, 'message' => 'Failed To Add Const To Database!')));
    //echo json_encode(array('status' => 200, 'message' => 'Success!!'));
?>