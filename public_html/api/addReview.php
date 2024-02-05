<?php

    include_once dirname(__FILE__) . '/../../utils/apiUtils.php';

    session_start();
    isMethod('POST');
    postEmptyField('note', 'vote', 'starFK');
    $_POST['userFK'] = $_SESSION['uuid'];

    include_once dirname(__FILE__) . '/../../model/review/insertReview.php';
?>