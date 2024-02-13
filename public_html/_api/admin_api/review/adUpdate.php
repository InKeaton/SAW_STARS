<?php
    include_once dirname(__FILE__) . '/includeReview.php';
    /**
     * Parte di controllo dei dati in input
     */
    isMethod('POST');
    postEmptyField('reviewID');
    /**
     * Parte di fetch dei dati e di comunicazione con il db
     */
    $rev = new Review();
    $rev->reviewID = $_POST['reviewID'];
    
    $result = $rev->Select();
    if(count($result) === 0)
        die(json_encode(array('status' => 0, 'message' => 'Star Not Found!')));

    $rev->starFK     =   (empty($_POST["starFK"]))     ?   $result[0]->starFK  : $_POST["starFK"];
    $rev->userFK     =   (empty($_POST["userFK"]))     ?   $result[0]->userFK  : $_POST["userFK"];
    $rev->vote       =   (empty($_POST["vote"]))       ?   $result[0]->vote    : $_POST["vote"];
    $rev->note       =   (empty($_POST["note"]))       ?   $result[0]->note    : $_POST["note"];
    $rev->revDate    =   (empty($_POST["revDate "]))   ?   $result[0]->revDate : $_POST["revDate"];
  
    if(!($rev->Update())) 
        die(json_encode(array('status' => 500, 'message' => 'Failed to update memory')));
    echo json_encode(array('status' => 200, 'message' => 'Memory '. $_POST['reviewID'] .' correctly updated'));
?>