<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/model/Review.php';

    $rev = new Review();
    $rev->starFK = $_POST['starFK'];
    $result = $rev->SelectStarReviews();
    if(!isset($result)) 
        die(json_encode(array('status' => 404, 'message' => 'Reviews not found in db')));
    echo json_encode($result);
?>