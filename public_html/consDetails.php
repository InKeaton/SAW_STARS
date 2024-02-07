<?php
    include_once  dirname(__FILE__) . '/../utils/sessionControl.php';  
    include_once  dirname(__FILE__) . '/../model/Constellation.php';
    include_once  dirname(__FILE__) . '/../model/Star.php';
    
    $cons = new Constellation();
    $cons->consID = $_GET['consID'];
    $consResult =   $cons->Select()[0]; 

    $stars = new Star();
    $stars->consFK = $_GET['consID'];
    $starResult = $stars->SelectConsStar();
?>
<!------------------------------------------------------------------------------------------------------------>
<!DOCTYPE html>
<html>
    <head>
        <title>Scheda di <?php echo $consResult->consName ?> </title>
    </head>
    <body> 
        <!-- navbar -->
        <?php include  dirname(__FILE__) . "/modules/navbar.php"; ?>
        <section id="cons_info">
            Cons Name:   <?php echo $consResult->consName;    ?><br>
            Data Inizio: <?php echo $consResult->startDate;   ?><br>
            Data Fine:   <?php echo $consResult->endDate;     ?><br>
            Descrizione: <?php echo $consResult->description; ?><br>
        </section>
        <section id="stars_info">
            Stelle appartenenti alla costellazione: <br>
            <table id="stars_table"></table>
        </section>
    </body>
<!------------------------------------------------------------------------------------------------------------>
    <script>
        async function displayAllStars() {
            stars = <?php echo json_encode($starResult);?>;

            outString = "<tr>" +
                            "<th>Nome</th>"     +
                            "<th>Distanza</th>" +
                            "<th>Prezzo</th>"   +
                        "</tr>";

            stars.forEach(element => {
                outString += "<tr><td><a href=starDetails.php?starID=" + element.starID + ">" + 
                                element.starName + "</a></td><td>" + 
                                element.dLY      + "</td><td>"     + 
                                element.price    + "</td></tr>";
            });
            document.getElementById("stars_table").innerHTML = outString;
        }   

        displayAllStars();
        
    </script>
</html>