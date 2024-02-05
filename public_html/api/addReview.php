<?php

    include_once dirname(__FILE__) . '/../../utils/apiUtils.php';

    isMethod('POST');
    postEmptyField('note', 'vote', 'starFK');

    session_start();
    $_POST['userFK'] = $_SESSION['uuid'];

    include_once dirname(__FILE__) . '/../../model/review/insertReview.php';


    echo json_encode(array('status'=>200, 'message' => 'OK'));
?>