<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/utils/sessionControl.php';  
    include_once $_SERVER['DOCUMENT_ROOT'] . '/model/Star.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/model/Constellation.php';
    
    $star = new Star();
    $cons = new Constellation();
    $star->starID =  $_GET['starID'] ;
    $starResult = $star->Select()[0];
    $cons->consID = $starResult->consFK;
    $consResult =   $cons->Select()[0]; 
?>

<!DOCTYPE html>

<html>
    <head>
        <title></title>
    </head>
    <body>
        <?php
            // navigation bar
            include  $_SERVER['DOCUMENT_ROOT'] . "/public_html/modules/navbar.php"; 
        ?>
        Star Name : <?php echo $starResult->starName ?> <br>
        Star Price : <?php echo $starResult->price?> <br>
        Star Distance Ligh Year : <?php echo $starResult->dLY?><br>
        Cons Name: <a href = "/public_html/consDetails.php?consID=<?php echo $consResult->consID;?>">
            <?php echo $consResult->consName;?><br> </a>
    </body> 
</html>
