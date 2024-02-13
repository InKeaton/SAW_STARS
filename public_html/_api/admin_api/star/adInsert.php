<?php
    include_once dirname(__FILE__)   .   '/includeStar.php';
      
    $star = new Star();

    $star->consFK = $_POST['consFK'];
    $star->starName = $_POST['starName'];
    $star->dLY = $_POST['dLY'];
    $star->price = $_POST['price'];

    if(!$star->Insert())
        die(json_encode(array('status' => 500, 'message' => 'Failed to add star to database!')));
    echo json_encode(array('status' => 200, 'message' => 'Star '. $_POST['starName'] .' correctly added to database'));
  
?>