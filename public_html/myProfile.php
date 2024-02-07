<!DOCTYPE html>
<?php
    include_once dirname(__FILE__) . '/../utils/sessionControl.php';  
    include_once dirname(__FILE__) . '/../model/User.php';
    include_once dirname(__FILE__) . '/../model/Sub.php';
    include_once dirname(__FILE__) . '/../model/Star.php';

    // Get user personal info
    $user = new User();
    $user->userID =  $_SESSION['uuid'];
    $profile = $user->Select()[0];

    // Get user Star Subscriptions
    $subs = new Sub();
    $subs->userFK =  $_SESSION['uuid'];
    $subs_list = $subs->SelectUserSubs();
?>
<!------------------------------------------------------------------------------------------------------------>
<html lang="it">
    <head>
        <title>Il Mio Profilo</title>
    </head>
    <!-- navbar -->
    <?php include  dirname(__FILE__) . "/modules/navbar.php"; ?>
    <body>
        <section id="user_info">
            Email : <?php echo $profile->email ?> <br>
            Nome : <?php echo $profile->firstName ?> <br>
            Cognome : <?php echo $profile->lastName ?> <br>
        </section>
        <section id="subs">
            Stelle seguite: <br>
            <table id="subs_table"></table>
        </section>
        
    </body>
<!------------------------------------------------------------------------------------------------------------>
    <script>
        async function unsubToStar(star) {
            // MODIFY LATER TO AVOID USING TEMPORARY VARIABLES!!!
            let response = await fetch('api/removeSub.php', { method: 'POST', 
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
                outString += "<tr id=\"subto_" + element.starID +"\"><td><a href=starDetails.php?starID=" + element.starID + ">" + 
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