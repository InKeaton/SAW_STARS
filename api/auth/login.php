<?php
  include_once $_SERVER['DOCUMENT_ROOT'] . '/utils/header.php';
  include_once $_SERVER['DOCUMENT_ROOT'] . '/utils/customs.php';

  validMethod('POST');

  validEmailAndPwd();

  include_once $_SERVER['DOCUMENT_ROOT'] . '/models/user/getUser.php';
  if (password_verify($_POST['pwd'], $user->GetField('pwd'))) {
    session_start();
    $_SESSION['userID'] = $user->GetField("userID");
    $_SESSION['role'] = $user->GetField("role");
    echo json_encode(array('status' => 200, 'message' => 'Successfully Logged In!'));
  } else die(json_encode(array('status' => 401, 'message' => 'Incorrect Email or Password!')));
?>
