<?php
    include_once dirname(__FILE__) . '/../Review.php';
    
    $rev = new Review();

    $rev->starFK = $_POST["starFK"];
    $rev->userFK = $_POST["userFK"];
    $rev->vote = $_POST["vote"];
    $rev->note = $_POST["note"];
    
    if(!$rev->Insert())
        die(json_encode(array('status' => 500, 'message' => 'Failed To Add Memory To Database!')));
    echo json_encode(array('status' => 200, 'message' => 'Success!!'));
?>
