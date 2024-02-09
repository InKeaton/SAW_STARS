<?php
    include_once dirname(__FILE__) . '/includeCons.php';
    $cons = new Constellation();
    $cons->consID = $_POST['consID'];
    $result = $cons->Select()[0];
    if(!isset($result))
      die(json_encode(array('status' => 0, 'message' => 'Star Not Found!')));

    $cons->consName    =  (empty($_POST['consName']))    ?   $result->consName    : $_POST['consName'];
    $cons->startDate   =  (empty($_POST['startDate']))   ?   $result->startDate   : $_POST['startDate']; 
    $cons->endDate     =  (empty($_POST['endDate']))     ?   $result->endDate     : $_POST['endDate'];
    $cons->description =  (empty($_POST['description'])) ?   $result->description : $_POST['description'];
    $cons->consImg     =  (empty($_POST['consImg']))     ?   $result->consImg     : $_POST['consImg'];
    if(!$cons->Update()) 
        die(json_encode(array('status' => 500, 'message' => 'Failed To Add Const To Database!')));
    echo json_encode(array('status' => 200, 'message' => 'success'));
?>