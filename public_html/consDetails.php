<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/utils/sessionControl.php';  
    include_once $_SERVER['DOCUMENT_ROOT'] . '/model/Constellation.php';
    
    $cons = new Constellation();
    $cons->consID = $_GET['consID'];
    $consResult =   $cons->Select()[0]; 
?>


<!DOCTYPE html>


<html>
    <head>
    </head>
    <body> 
        Cons Name: <?php echo $consResult->consName; ?><br>
        Data Inizio: <?php echo $consResult->startDate;?><br>
        Data Fine: <?php echo $consResult->endDate; ?><br>
        Descrizione: <?php echo $consResult->description; ?><br>
    </body>
    <script>
    </script>
</html>