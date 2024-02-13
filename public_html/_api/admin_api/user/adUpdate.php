<?php
    include_once dirname(__FILE__) . '/includeUser.php';
    /**
     * Parte di controllo dei dati mandati in input
     */
    isMethod('POST');
    postEmptyField('userID');
    if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
        die(json_encode(array('status' => 100, 'message' => 'Email syntax is not correct' )));
        
    if((strlen($_POST['pass'])<10)) 
        die(json_encode(array('status' => 0, 'message' => 'Pass must have more than 10 characters')));
    /**
     * Parte di fetch dei dati e invio dei dati al database
     */
    $user = new User();

    $user->userID = $_POST["userID"];
    $result = $user->Select();
    if(count($result) === 0)
        die(json_encode(array('status' => 0, 'message' => 'User Not Found!')));
    
    $user->role         =   (isset($_POST["role"]))         ? 1                      :   0;
    $user->email        =   (empty($_POST["email"]))        ? $result[0]->email      :   htmlspecialchars($_POST["email"]);
    $user->pwd          =   (empty($_POST["pass"]))         ? $result[0]->pwd        :   $_POST["pass"];
    $user->firstName    =   (empty($_POST["firstname"]))    ? $result[0]->firstName  :   htmlspecialchars($_POST["firstname"]);
    $user->lastName     =   (empty($_POST["lastname"]))     ? $result[0]->lastName   :   htmlspecialchars($_POST["lastname"]);
    $user->createDate   =   (empty($_POST["createDate"]))   ? $result[0]->createDate :   $_POST["createDate"];
    
    if(!($user->Update())) 
        die(json_encode(array('status' => 500, 'message' => 'Failed to update user')));
    echo json_encode(array('status' => 200, 'message' => 'User '. $_POST['userID'] .' correctly updated'));
?> 
