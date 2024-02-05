<?php
    include_once dirname(__FILE__) . '/../Constellation.php';
    
    $cons = new Constellation();

    $cons->consID = $_POST['consID'];
    if(!$cons->Delete())
      die(json_encode(array('status' => 500, 'message' => 'Failed To Add Const To Database!')));
    //echo json_encode(array('status' => 200, 'message' => 'Success!!'));
?>