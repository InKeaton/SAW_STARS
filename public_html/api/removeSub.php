<?php
    include_once dirname(__FILE__) . '/../../utils/apiUtils.php';

    session_start();
    $_POST["userFK"] = $_SESSION["uuid"];

    isMethod('POST');
    postEmptyField('userFK', 'starFK');

    include_once dirname(__FILE__) . '/../../model/sub/deleteCoupleSub.php';
?>