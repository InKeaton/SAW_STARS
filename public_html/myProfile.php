<!DOCTYPE html>
<?php
    include_once dirname(__FILE__) . '/../utils/sessionControl.php';  
    include_once dirname(__FILE__) . '/../model/User.php';
    include_once dirname(__FILE__) . '/../model/Sub.php';
    include_once dirname(__FILE__) . '/../model/Star.php';

    $user = new User();
    $user->userID =  $_SESSION['uuid'];
    $profile = $user->Select()[0];
?>
<!------------------------------------------------------------------------------------------------------------>
<html lang="it">
    <head>
        <title>My Profile</title>
    </head>
    <?php
        // navigation bar
        include dirname(__FILE__) .  "/modules/navbar.php"; 
    ?>
    <body>
        <section id="user_info">
        User Email : <?php echo $profile->email ?> <br>
        User Name : <?php echo $profile->firstName ?> <br>
        User Surname : <?php echo $profile->lastName ?> <br>
        </section>
        Stars : <br>
        <section id="stars_info">
        </section>
        
    </body>
<!------------------------------------------------------------------------------------------------------------>
    <script>
        async function unsubToStar(star) {
            // MODIFY LATER TO AVOID USING TEMPORARY VARIABLES!!!
            let response = await fetch('api/removeSub.php', { method: 'POST', 
                                                              headers: { "Content-type": "application/x-www-form-urlencoded" },
                                                              body : new URLSearchParams({
                                                                  'starFK': star,
                                                                  'userFK': '<?php echo $_SESSION['uuid']?>',
                                                              })});
            let result = await response.json();

            if(result.status == 200){
                alert("Abbonamento annullato con successo!");
                displayAllSubs();
                return;
            } else {
                alert("Errore nella disiscrizione");
            };
        };

        async function displayAllSubs() {
            // MODIFY LATER TO AVOID USING TEMPORARY VARIABLES!!!
            let response = await fetch('api/getUserSubs.php', { method: 'POST', 
                                                              headers: { "Content-type": "application/x-www-form-urlencoded" },
                                                              body : new URLSearchParams({
                                                                  'userFK': '<?php echo $_SESSION['uuid']?>',
                                                              })});
            let subs = await response.json();

            outString = "<table>" +
                            "<tr>" +
                                "<th>Nome</th>" +
                                "<th>Prezzo</th>" +
                                "<th>Data d'inizio</th>" +
                                "<th>Durata</th>" +
                            "</tr>";
            subs.forEach(element => {
                outString += "<tr><td><a href=starDetails.php?starID=" + element.starID + ">" + 
                                element.starName + "</td><td>" + 
                                element.price + "</td><td>" + 
                                element.startDate + "</td><td>" +
                                element.life + " Mesi </td><td>" +
                                "<input id=\"unsubscribe\" type=\"button\" value=\"Disiscriviti\" onclick=\"unsubToStar(\'" + 
                                element.starID + "\');\"></td></tr>";
            });
            outString += "</table>";
            document.getElementById("stars_info").innerHTML = outString;
        }   

        displayAllSubs();
        
    </script>

</html>