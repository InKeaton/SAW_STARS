<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/utils/apiUtils.php';

    session_start();
    isLog();
    isMethod('POST');
    postEmptyField('email', 'firstname', 'lastname', 'createDate');
    $_POST['userID'] = $_SESSION['uuid'];
    include_once $_SERVER['DOCUMENT_ROOT'] . '/model/user/updateUser.php';
    echo json_encode(array('status' => 200, 'message' => 'Success!!'));
?>