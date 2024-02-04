<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/utils/apiUtils.php';

    session_start();
    isLog();
    isMethod('POST');

    include_once $_SERVER['DOCUMENT_ROOT'] . '/model/User.php';
    $user = new User();
    $user->userID = $_POST["userID"];
    $user->role = (empty($_POST["role"]))? 0 : 1;
    $user->UpdateRole();
    echo json_encode(array('status' => 200, 'message' => 'success'));
?>