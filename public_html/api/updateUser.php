<?php
    include_once dirname(__FILE__) . '/../../utils/apiUtils.php';

    session_start();
    isLog();
    isMethod('POST');
    postEmptyField('email', 'firstname', 'lastname', 'createDate');
    $_POST['userID'] = $_SESSION['uuid'];
    include_once dirname(__FILE__) . '/../../model/user/updateUser.php';
    echo json_encode(array('status' => 200, 'message' => 'Success!!'));
?>