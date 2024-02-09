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
    
        <section class ="bento" id="cons_info">
            <div class="grid1">Nome:<br><?php echo $consResult->consName;?></div>
            <div class="grid2">Descrizione:<br><?php echo $consResult->description;?></div>
            <div class="grid3">Visibile da:<br><?php echo $consResult->startDate;?><br>a:<br><?php echo $consResult->endDate;?></div>
            <div class="grid4">Stelle contenute:<br>DA FARE</div>
            <div class="grid5">Stelline totali ricevute:<br>DA FARE</div>
        </section>
        <section class="table" id="stars_info">
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