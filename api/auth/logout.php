<?php
  include_once $_SERVER['DOCUMENT_ROOT'] . '/utils/header.php';
  include_once $_SERVER['DOCUMENT_ROOT'] . '/utils/customs.php';

  session_start();
  isUser();

  setcookie(session_name(), '', -1, '/');
  session_destroy();
  echo json_encode(array('status' => 200, 'message' => 'Successfully Logged Out!'));
?>
