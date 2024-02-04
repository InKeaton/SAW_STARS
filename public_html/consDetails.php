<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/utils/sessionControl.php';  
    include_once $_SERVER['DOCUMENT_ROOT'] . '/model/Constellation.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/model/Star.php';
    
    $cons = new Constellation();
    $cons->consID = $_GET['consID'];
    $consResult =   $cons->Select()[0]; 

    $stars = new Star();
    $stars->consFK = $_GET['consID'];
    $starResult = $stars->SelectConsStar();
?>

<!DOCTYPE html>
<html>
    <head>
    </head>
    <body> 
    <?php
        // navigation bar
        include  $_SERVER['DOCUMENT_ROOT'] . "/public_html/modules/navbar.php"; 
    ?>
    <section id="cons_info">
        Cons Name: <?php echo $consResult->consName; ?><br>
        Data Inizio: <?php echo $consResult->startDate;?><br>
        Data Fine: <?php echo $consResult->endDate; ?><br>
        Descrizione: <?php echo $consResult->description; ?><br>
        Stars : <br>
    </section>
    <section id="stars_info">
    </section>
    </body>
    <script>
        displayAllStars();

        function displayAllStars() {
            stars = <?php echo json_encode($starResult);?>;
            outString = "<table><tr><th>Nome</th><th>Distanza</th><th>Prezzo</th></tr>";
            stars.forEach(element => {
                outString += "<tr><td><a href=starDetails.php?starID=" + element.starID + ">" + element.starName + "</a></td><td>" + element.dLY + " Anni Luce</td><td>" + element.price + "</td></tr>";
            });
            outString += "</table>";
            document.getElementById("stars_info").innerHTML = outString;
        }   
    </script>
</html>