<?php
    include_once dirname(__FILE__) . '/../Star.php';
    
    $star = new Star();
    $star->starID = $_POST['starID'];
    $result = $star->SelectStarCons()[0];
    if(!isset($result)) 
        die(json_encode(array('status' => 404, 'message' => 'Star not found in db')));
    echo json_encode($result);
?>
