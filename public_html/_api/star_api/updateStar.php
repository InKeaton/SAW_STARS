<?php
    include_once dirname(__FILE__) . '/includeStar.php';
    /**
     * Parte di controllo dei dati in input
     */
    isMethod('POST');
    postEmptyField('starName', 'dLY', 'price', 'starID');
    /**
     * Parte di fetch dei dati e di comunicazione con il db
     */
    $star = new Star();
    $star->starID = $_POST['starID'];
    
    $result = $star->Select();
    if(!isset($result))
      die(json_encode(array('status' => 0, 'message' => 'Star Not Found!')));

    $star->consFK   =   (empty($_POST["consFK"]))   ?   $result[0]->consFK   : $_POST["consFK"];
    $star->starName =   (empty($_POST["starName"])) ?   $result[0]->starName : $_POST["starName"];
    $star->dLY      =   (empty($_POST["dLY"]))      ?   $result[0]->dLY      : $_POST["dLY"];
    $star->price    =   (empty($_POST["price"]))    ?   $result[0]->price    : $_POST["price"];
  
    if(!($star->Update())) 
      die(json_encode(array('status' => 0, 'message' => 'Failed to Update Star!')));
 
    echo json_encode(array('status' => 200, 'message' => 'Success!!'));
?>