<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/utils/sessionControl.php';
    if($_SESSION['role']) header('Location: /public_html/admin/adminHome.php');
?>

<!DOCTYPE html>

<html>
    <head>
        <title> HOME </title>
        <style>
            #top {
                height: 20%;
                width: 100%;
            }
        </style>
        
    </head>
    <body> 
        <div id="top">
            <h1>HOME</h1>
            <div>
                <button>LOGOUT</button>
            </div>
        </div>
        <hr>
    </body>
    <script>

    </script>
</html>