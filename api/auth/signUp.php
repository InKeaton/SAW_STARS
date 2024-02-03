<?php
  include_once $_SERVER['DOCUMENT_ROOT'] . '/utils/header.php';
  include_once $_SERVER['DOCUMENT_ROOT'] . '/utils/customs.php';

  validMethod('POST');

  validInput(empty($_POST['firstName']), "First Name Field Can't Be Empty!");
  validInput(empty($_POST['lastName']), "Last Name Field Can't Be Empty!");
  validEmailAndPwd();
  validInput($_POST['pwd'] !== $_POST['pwd_confirm'], "Passwords Doesn't Match!");

  include_once $_SERVER['DOCUMENT_ROOT'] . '/models/user/insertUser.php';
  include_once $_SERVER['DOCUMENT_ROOT'] . '/api/auth/login.php';
?>
