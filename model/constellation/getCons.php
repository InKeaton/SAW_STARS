<?php
    include_once dirname(__FILE__) . '/../Constellation.php';
    
    $cons = new Constellation();
    $cons->consID = $_POST["consID"];
    $result = $cons->Select()[0];
    if(!isset($result)) 
        die(json_encode(array("error" => "404", "message" => "constellation not found in DB")));
    echo json_encode($result);
?>
