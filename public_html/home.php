<?php
    include_once dirname(__FILE__) . '/../utils/sessionControl.php';
    if($_SESSION['role']) header('Location: /admin/adminHome.php');
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
        <?php
            // navigation bar
            include  dirname(__FILE__)  . "/modules/navbar.php"; 
        ?>

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