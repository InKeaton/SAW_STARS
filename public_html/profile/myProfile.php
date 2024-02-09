<!DOCTYPE html>
<?php
    include_once dirname(__FILE__) . '/../../api/_utils/sessionControl.php';  
    include_once dirname(__FILE__) . '/../../api/_model/User.php';
    include_once dirname(__FILE__) . '/../../api/_model/Sub.php';
    include_once dirname(__FILE__) . '/../../api/_model/Star.php';

    // Get user personal info
    $user = new User();
    $user->userID =  $_SESSION['uuid'];
    $profile = $user->Select()[0];

    // Get user Star Subscriptions
    $subs = new Sub();
    $subs->userFK =  $_SESSION['uuid'];
    $subs_list = $subs->SelectUserSub();
?>
<!------------------------------------------------------------------------------------------------------------>
<html lang="it">
    <head>
        <title>Il Mio Profilo</title>
        <!-- CSS stylesheet -->
        <link rel="stylesheet" href="../_resources/style/test_bento.css">
        <link rel="stylesheet" href="../_resources/style/main.css">
    </head>
    <body>
        <!-- navbar -->
        <?php include  dirname(__FILE__) . "/../_modules/navbar.php"; ?>

        <header class = "logo">
            <h1>Il tuo Profilo</h1>
        </header>

        <section class="main_container" id="user_info">
            <div class="row">
                <div class="column">
                    <div class="Nome">Nome:<br><?php echo $profile->firstName ?></div>
                    <div class="Cognome">Cognome:<br><?php echo $profile->lastName ?></div>
                    <div class="Email">Email:<br><?php echo $profile->email ?></div>
                </div>
                <div class="column">
                    <div class="Data-Iscrizione">Data Iscrizione:<br><?php echo $profile->createDate ?></div>
                    <div class="N°-Sottoscrizioni">N° Sottoscrizioni:<br>DA FARE</div>
                    <div class="N°-Ricordi">Ricordi Condivisi:<br>DA FARE</div>
                </div>
            </div>
        </section>
        <section class="table" id="subs">
            Stelle seguite: <br>
            <table id="subs_table"></table>
        </section>
        <!-- footer -->
        <?php include  dirname(__FILE__) . "/../_modules/footer.html"; ?>
    </body>
<!------------------------------------------------------------------------------------------------------------>
    <script>
        async function unsubToStar(star) {
            // MODIFY LATER TO AVOID USING TEMPORARY VARIABLES!!!
            let response = await fetch('../../api/sub_api/deleteSubUserStar.php', { method: 'POST', 
                                                              headers: { "Content-type": "application/x-www-form-urlencoded" },
                                                              body : new URLSearchParams({'starFK': star})});
            let result = await response.json();

            if(result.status == 200){
                alert("Abbonamento annullato con successo!");
                document.getElementById("subto_" + star).remove();
                return;
            } else {alert("Errore nella disiscrizione");};
        };

        function displayAllSubs() {
            subs = <?php echo json_encode($subs_list);?>;

            outString = "<tr>" +
                            "<th>Nome</th>" +
                            "<th>Prezzo</th>" +
                            "<th>Data d'inizio</th>" +
                            "<th>Durata</th>" +
                        "</tr>";

            subs.forEach(element => {
                outString += "<tr id=\"subto_" + element.starID +"\"><td><a href=/public_html/stars/starDetails.php?starID=" + element.starID + ">" + 
                                element.starName + "</td><td>" + 
                                element.price + "</td><td>" + 
                                element.startDate + "</td><td>" +
                                element.life + " Mesi </td><td>" +
                                "<input id=\"unsubscribe\" type=\"button\" value=\"Disiscriviti\" onclick=\"unsubToStar(\'" + 
                                element.starID + "\');\"></td></tr>";
            });

            document.getElementById("subs_table").innerHTML = outString;
        }   
        
        displayAllSubs();
    </script>
</html>