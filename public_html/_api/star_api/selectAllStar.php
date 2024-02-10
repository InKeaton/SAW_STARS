<?php
    include_once dirname(__FILE__) . '/includeStar.php';
    $star = new Star();

    if(count($result = $star->SelectAll()) === 0)
        die(json_encode(array('status' => 404, 'message' => 'No star in DB')));
    echo json_encode($result);
?>