<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/model/Review.php';

    $rev = new Review();

    $rev->starFK = $_POST["starFK"];
    $rev->userFK = $_POST["userFK"];
    $rev->vote = $_POST["vote"];
    $rev->note = $_POST["note"];
    
    if(!$rev->Insert())
        die(json_encode(array('status' => 500, 'message' => 'Failed To Add Star To Database!')));
    //echo json_encode(array('status' => 200, 'message' => 'Success!!'));
?>
