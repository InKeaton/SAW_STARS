<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/model/Review.php';

    $rev = new Review();
    $rev->reviewID = $_POST['reviewID'];
    $result = $rev->Select()[0];
    if(!isset($result)) 
        die(json_encode(array('status' => 404, 'message' => 'Review not find in db')));
    echo json_encode($result);
?>
