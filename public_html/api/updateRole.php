<?php
    include_once dirname(__FILE__) . '/../../utils/apiUtils.php';

    session_start();
    isLog();
    isMethod('POST');

    include_once dirname(__FILE__) . '/../../model/User.php';
    $user = new User();
    $user->userID = $_POST["userID"];
    $user->role = (empty($_POST["role"]))? 0 : 1;
    $user->UpdateRole();
    echo json_encode(array('status' => 200, 'message' => 'success'));
?>