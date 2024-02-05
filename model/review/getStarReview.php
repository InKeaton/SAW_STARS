<?php
    include_once dirname(__FILE__) . '/../Review.php';
    
    $rev = new Review();
    $rev->starFK = $_POST['starFK'];
    $result = $rev->SelectStarReviews();
    
    if(!isset($result)) 
        die(json_encode(array('status' => 404, 'message' => 'Reviews not found in db')));
    echo json_encode($result);
?>