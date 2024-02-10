<?php

    include_once dirname(__FILE__) . '/includeStar.php';
    /**
     * Parte di controllo dell'input
     */
    isMethod('POST');
    postEmptyField('starFK');
    /**
     * Parte di fetch dei dati e di comunicazione con il db
     */
    $rev = new Review();
    $rev->starFK = $_POST['starFK'];
    $result = $rev->SelectStarReviews();
    if(!isset($result)) 
        die(json_encode(array('status' => 404, 'message' => 'Reviews not found in db')));
    echo json_encode($result);
?>