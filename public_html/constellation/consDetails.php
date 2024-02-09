<?php
    include_once  dirname(__FILE__) . '/../../api/_utils/sessionControl.php';  
    include_once  dirname(__FILE__) . '/../../api/_model/Constellation.php';
    include_once  dirname(__FILE__) . '/../../api/_model/Star.php';
    
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
        <!-- CSS stylesheet -->
        <link rel="stylesheet" href="../_resources/style/test_bento.css">
        <link rel="stylesheet" href="../_resources/style/main.css">
    </head>
    <body> 
        <!-- navbar -->
        <?php include  dirname(__FILE__) . "/../_modules/navbar.php"; ?>

        <header class = "logo">
            <h1>Scheda di <?php echo $consResult->consName ?></h1>
        </header>
    
        <section class ="main_container" id="cons_info">
            <div class="row">
                <div class="column">
                    <div class="Nome">Nome:<br><?php echo $consResult->consName;?></div>
                    <div class="Cognome">Descrizione:<br><?php echo $consResult->description;?></div>
                    <div class="Email">Visibile da:<br><?php echo $consResult->startDate;?><br>a:<br><?php echo $consResult->endDate;?></div>
                </div>
                <div class="column">
                    <div class="Data-Iscrizione">Stelle contenute:<br>DA FARE</div>
                    <div class="N°-Sottoscrizioni">Stelline totali ricevute:<br>DA FARE</div>
                </div>
            </div>
        </section>
        <section class="main_container" id="stars_info">
            Stelle appartenenti alla costellazione: <br>
            <table id="stars_table"></table>
        </section>
        <!-- footer -->
        <?php include  dirname(__FILE__) . "/../_modules/footer.html"; ?>
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
                outString += "<tr><td><a href=../stars/starDetails.php?starID=" + element.starID + ">" + 
                                element.starName + "</a></td><td>" + 
                                element.dLY      + "</td><td>"     + 
                                element.price    + "</td></tr>";
            });
            document.getElementById("stars_table").innerHTML = outString;
        }   

        displayAllStars();
        
    </script>
</html>