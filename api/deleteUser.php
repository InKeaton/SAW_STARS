<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/utils/apiUtils.php';

    session_start();
    isLog();
    isMethod('POST');

    include_once $_SERVER['DOCUMENT_ROOT'] . '/model/user/deleteUser.php';
    echo json_encode(array('status' => 200, 'message' => 'success'));
?>