<?php
    include_once dirname(__FILE__) . '/../Sub.php';
    
    $sub = new Sub();

    $sub->userFK = $_POST['userFK'];
    $sub->starFK = $_POST['starFK'];
    if(!$sub->DeleteCoupleSub())
      die(json_encode(array('status' => 500, 'message' => 'Failed To Remove SUB from Database!')));
    echo json_encode(array('status' => 200, 'message' => 'Success!!'));
?>