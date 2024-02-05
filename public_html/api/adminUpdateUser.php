<?php
    include_once dirname(__FILE__) . '/../../utils/apiUtils.php';

    session_start();
    isLog();
    isMethod('POST');
    postEmptyField('email', 'firstname', 'lastname', 'createDate', 'userID', 'pass');
    if($_POST['confirm'] !== $_POST['pass']) 
        $_POST['confirm'] = $_POST['pass'] = '';
    include_once dirname(__FILE__) . '/../../model/user/updateUser.php';
    echo json_encode(array('status' => 200, 'message' => 'Success!!'));
?> 