<?php
    include_once dirname(__FILE__) . '/../Constellation.php';
    
    $cons = new Constellation();
    if(!($result = $cons->SelectAll()))
        die(json_encode(array('status' => 404, 'message' => 'No const in DB')));

    echo json_encode($result);
?>