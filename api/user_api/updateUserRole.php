<?php
    include_once dirname(__FILE__) . '/includeUser.php';
    /**
     * Parte di controllo dell'input
     */
    session_start();
    isLog();
    isMethod('POST');
    /**
     * Parte di fetch dei dati e di invio dei dati al database
     */
    $user = new User();
    $user->userID = $_POST["userID"];
    $user->role = (empty($_POST["role"]))? 0 : 1;
    $user->UpdateRole();
    echo json_encode(array('status' => 200, 'message' => 'success'));
?>