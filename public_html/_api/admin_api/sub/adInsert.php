<?php
    include_once dirname(__FILE__)   .   '/includeSub.php';
    postEmptyField('userFK', 'starFK', 'startDate', 'life');
    
    $sub = new Sub();

    $sub->userFK = $_POST['userFK'];
    $sub->starFK = $_POST['starFK'];
    $sub->startDate = $_POST['startDate'];
    $sub->life = $_POST['life'];

    if(!$sub->Insert())
        die(json_encode(array('status' => 500, 'message' => 'Failed to add subscription to database!')));
    echo json_encode(array('status' => 200, 'message' => 'Subscription correctly added to database'));
  
?>