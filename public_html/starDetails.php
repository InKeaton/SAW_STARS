<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/utils/sessionControl.php';  
    include_once $_SERVER['DOCUMENT_ROOT'] . '/model/Star.php';
    $star = new Star();
    $star->starID =  $_GET['starID'] ;
    $result = $star->Select()[0];

?>

<!DOCTYPE html>

<html>
    <head>
        <title></title>
    </head>
    <body>
        Star Name : <?php echo $result->starName ?> <br>
        Star Price : <?php echo $result->price?> <br>
        Star Distance Ligh Year : <?php echo $result->dLY?><br>
    </body>
</html>