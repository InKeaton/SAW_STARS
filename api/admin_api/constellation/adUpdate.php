<?php
    include_once dirname(__FILE__) . '/includeCons.php';
    $cons = new Constellation();
    $cons->consID = $_POST['consID'];
    $result = $cons->Select();
    if(!isset($result))
      die(json_encode(array('status' => 0, 'message' => 'Star Not Found!')));

    $cons->consName    =  (empty($_POST['consName']))    ?   $result[0]->consName    : $_POST['consName'];
    $cons->startDate   =  (empty($_POST['startDate']))   ?   $result[0]->startDate   : $_POST['startDate']; 
    $cons->endDate     =  (empty($_POST['endDate']))     ?   $result[0]->endDate     : $_POST['endDate'];
    $cons->description =  (empty($_POST['description'])) ?   $result[0]->description : $_POST['description'];
    $cons->consImg     =  (empty($_POST['consImg']))     ?   $result[0]->consImg     : $_POST['consImg'];
    if(!$cons->Update()) 
        die(json_encode(array('status' => 500, 'message' => 'Failed To Add Const To Database!')));
    echo json_encode(array('status' => 200, 'message' => 'success'));
?>