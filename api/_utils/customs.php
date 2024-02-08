<?php
  function validMethod($method) {
    if ($_SERVER['REQUEST_METHOD'] != $method)
      die(json_encode(array('status' => 405, 'message' => 'Invalid Method!')));
  }

  function validInput($input, $message) {
    if ($input)
      die(json_encode(array('status' => 422, 'message' => $message)));
  }

  function validEmailAndPwd() {
    validInput(empty($_POST['email']), "Email Field Can't Be Empty!");
    validInput(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL), 'Invalid Email Format!');
    validInput(strlen($_POST['pwd']) < 8, 'Password Should Be At Least 8 Characters Long!');
  }

  function isUser() {
    if (!empty($_COOKIE['PHPSESSID']) && empty($_SESSION['userID']))
      include_once $_SERVER['DOCUMENT_ROOT'] . '/api/auth/logout.php';
  }
?>
