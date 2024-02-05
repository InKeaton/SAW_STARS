<?php
    /**
     * API che serve per la registrazione dell'utente al db.
     * Se i campi richiesti non sono vuoti e esistono allora verrà verificato che il campo pass sia uguale al campo confirm.
     * Se è così si ritorna come risposta una 200.
     */
    
    include_once dirname(__FILE__) . '/../../utils/apiUtils.php';
    
    isMethod('POST');
    postEmptyField('email', 'pass', 'confirm', 'firstname', 'lastname');

    if($_POST['pass'] !== $_POST['confirm'])
        die(json_encode(array('status' => 100, 'message' => 'Confirm password must be equal to password' )));

    include_once dirname(__FILE__) . '/../../model/user/insertUser.php';
    echo json_encode(array('status' => 300, 'message' => 'Success!!'));
?>