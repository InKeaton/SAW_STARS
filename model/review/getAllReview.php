<?php
    include_once dirname(__FILE__) . '/../Review.php';
    
    $rev = new Review();
    if(!($result = $rev->SelectAll()))
        die(json_encode(array('status' => 404, 'message' => 'No review in DB')));
    echo json_encode($result);
?>