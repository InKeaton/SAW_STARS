<?php
    include_once dirname(__FILE__) . '/../Constellation.php';
    
    $cons = new Constellation();
    $cons->consID = $_POST['consID'];
    $result = $cons->Select()[0];
    
    if(!isset($result))
        die(json_encode(array('status' => 0, 'message' => 'Const Not Found!')));
        
    $cons->consName =  $_POST["consName"];
    $cons->startDate =  $_POST["startDate"];
    $cons->endDate =  $_POST["endDate"];
    $cons->description =  $_POST["description"];
    $cons->consImg = $_POST["consImg"];
    
    if(!($cons->Update())) 
        die(json_encode(array('status' => 0, 'message' => 'Failed to Update Const!')));
    //echo json_encode(array('status' => 200, 'message' => 'Success!!'));
?>