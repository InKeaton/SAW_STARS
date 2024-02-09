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
    
    $result = $rev->Select()[0];
    if(!isset($result))
      die(json_encode(array('status' => 0, 'message' => 'Star Not Found!')));

    $rev->starFK     =   (empty($_POST["starFK"]))     ?   $result->starFK  : $_POST["starFK"];
    $rev->userFK     =   (empty($_POST["userFK"]))     ?   $result->userFK  : $_POST["userFK"];
    $rev->vote       =   (empty($_POST["vote"]))       ?   $result->vote    : $_POST["vote"];
    $rev->note       =   (empty($_POST["note"]))       ?   $result->note    : $_POST["note"];
    $rev->revDate    =   (empty($_POST["revDate "]))   ?   $result->revDate : $_POST["revDate"];
  
    if(!($rev->Update())) 
      die(json_encode(array('status' => 0, 'message' => 'Failed to Update Star!')));
 
    echo json_encode(array('status' => 200, 'message' => 'Success!!'));
?>