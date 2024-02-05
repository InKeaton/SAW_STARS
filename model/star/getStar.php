<?php


    include_once dirname(__FILE__) . '/../Star.php';
    
    $star = new Star();
    $star->starID = $_POST['starID'];
    $result = $star->Select()[0];
    if(!isset($result)) 
        die(json_encode(array('status' => 404, 'message' => 'Review not find in db')));
    echo json_encode($result);
?>
