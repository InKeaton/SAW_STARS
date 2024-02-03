<?php
  $env = parse_ini_file($_SERVER['DOCUMENT_ROOT'] . '/.env');

  header('Access-Control-Allow-Credentials: true');
  header('Access-Control-Allow-Origin: ' . $env['CLIENT_URL']);
  //header('Content-Type: application/json'); 
?>