<?php

    include_once dirname(__FILE__) . '/../Star.php';
    
    $star = new Star();
    $star->consFK = $_POST['consFK'];
    $result = $star->SelectConsStar();
    if(!isset($result)) 
        die(json_encode(array('status' => 404, 'message' => 'Associated stars not found not find in db')));
    echo json_encode($result);
?>