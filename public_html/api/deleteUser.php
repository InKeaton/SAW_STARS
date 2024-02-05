<?php

    include_once dirname(__FILE__) . '/../../utils/apiUtils.php';
    
    session_start();
    isLog();
    isMethod('POST');

    include_once  dirname(__FILE__) . '/../../model/user/deleteUser.php';
    echo json_encode(array('status' => 200, 'message' => 'success'));
?>