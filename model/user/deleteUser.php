<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/model/User.php';
    $user = new User();

    $user->userID =  $_POST['userID'];
    if(!$user->Delete())
      die(json_encode(array('status' => 500, 'message' => 'Failed To Add User To Database!')));
    //echo json_encode(array('status' => 200, 'message' => 'Success!!'));
?>