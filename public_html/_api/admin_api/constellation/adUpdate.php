<?php
    include_once dirname(__FILE__) . '/includeCons.php';
    $cons = new Constellation();
    postEmptyField('consID');
    $cons->consID = $_POST['consID'];
    $result = $cons->Select();
    if(count($result) === 0)
      die(json_encode(array('status' => 0, 'message' => 'Star Not Found!')));

    $cons->consName    =  (empty($_POST['consName']))    ?   $result[0]->consName    : $_POST['consName'];
    $cons->startDate   =  (empty($_POST['startDate']))   ?   $result[0]->startDate   : $_POST['startDate']; 
    $cons->endDate     =  (empty($_POST['endDate']))     ?   $result[0]->endDate     : $_POST['endDate'];
    $cons->description =  (empty($_POST['description'])) ?   $result[0]->description : htmlspecialchars($_POST['description']);

    if(!$cons->Update()) 
        die(json_encode(array('status' => 500, 'message' => 'Failed to update constellation')));
    echo json_encode(array('status' => 200, 'message' => 'Constellation '. $_POST['consID'] .' correctly updated'));
?>
