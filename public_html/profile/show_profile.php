<!DOCTYPE html>
<?php
    include_once dirname(__FILE__) . '/../_api/_utils/sessionControl.php';  
    include_once dirname(__FILE__) . '/../_api/_model/User.php';
    include_once dirname(__FILE__) . '/../_api/_model/Sub.php';
    include_once dirname(__FILE__) . '/../_api/_model/Star.php';
    include_once dirname(__FILE__) . '/../_api/_model/Review.php';

    // Get user personal info
    $user = new User();
    $user->userID =  $_SESSION['uuid'];
    $profile = $user->Select()[0];

    $rev = new Review();
    $rev->userFK = $_SESSION['uuid'];

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
        <link rel="stylesheet" media="screen and (orientation: landscape)" href="../_resources/style/landscape/details.css">
        <link rel="stylesheet" media="screen and (orientation: portrait)"  href="../_resources/style/portrait/details.css">
    </head>
    <body>
        <!-- navbar -->
        <?php include  dirname(__FILE__) . "/../_modules/navbar.php"; ?>

        <header class = "logo">
            <h1>Il mio Profilo</h1>
        </header>
        
        <section class="bento" id="user_info">
            <article class="grid5">Nome:<br>             <?php echo $profile->firstName ?></article>
            <article class="grid5">Cognome:<br>          <?php echo $profile->lastName ?></article>
            <article class="grid3">Email:<br>            <?php echo $profile->email ?></article>
            <article class="grid3">Data Iscrizione:<br>  <?php echo date("Y-m-d", strtotime($profile->createDate)); ?></article>
            <article class="grid2">N° Sottoscrizioni:<br><output id="numSub"></output></article>
            <article class="grid2">Ricordi Condivisi:<br><?php echo $rev->SelectCountUser()[0]->revCount; ?></article>
        </section>

        <section class="table_container" id="subs"> 
            <?php
            if(count($subs_list)) {
                echo "<h2>Stelle seguite:</h2> 
                      <table class=\"table\" id=\"subs_table\"></table>";
            } 
            else {
                echo "<h2>Qui è tutto vuoto...</h2>
                      <p>Scorri la lista di stelle disponibili!</p>
                      <button class=\"button\" onclick=\"location.href='../stars/starList.php';\">Cerca Stelle</button>";
            }
            ?>
        </section>

        <section class="table_container"id="update">
            <h2> Cambiato idea? </h2>
            <p> Modifica le informazioni del tuo account!</p><br>
            <button class="button" onclick="location.href='update_profile.php';">Modifica Profilo</button>
        </section>
        
        <!-- footer -->
        <?php include  dirname(__FILE__) . "/../_modules/footer.html"; ?>
        <?php include_once  dirname(__FILE__) . "/../_modules/modal.html"; ?>
    </body>
<!------------------------------------------------------------------------------------------------------------>
    <script>
        async function unsubToStar(star) {
            // MODIFY LATER TO AVOID USING TEMPORARY VARIABLES!!!
            let response = await fetch('../_api/sub_api/deleteSubUserStar.php', { method: 'POST', 
                                                              headers: { "Content-type": "application/x-www-form-urlencoded" },
                                                              body : new URLSearchParams({'starFK': star})});
            let result = await response.json();

            if (result.status == 200){
                DisplayModal(1, result.message);
                document.getElementById("subto_" + star).remove();
                if(document.getElementById("subs_table").rows.length == 1) {
                    document.getElementById("subs").innerHTML = "<h2>Qui è tutto vuoto...</h2>" +
                                                                "<p>Scorri la lista di stelle disponibili!</p>" +
                                                                "<button class=\"button\" onclick=\"location.href='../stars/starList.php';\">Cerca Stelle</button>";
                }
                return;
            } 
            else {DisplayModal(0, result.message);};
        };

        function displayAllSubs() {
            var subs = <?php echo json_encode($subs_list);?>;
            var countSub = 0;
            var outString = "<tr>" +
                            "<th>Nome</th>" +
                            "<th>Prezzo</th>" +
                            "<th>Data d'inizio</th>" +
                            "<th>Durata</th>" +
                        "</tr>";

            subs.forEach(element => {
                countSub++;
                outString += "<tr id=\"subto_" + element.starID +"\"><td><a href=../stars/starDetails.php?starID=" + element.starID + ">" + 
                                element.starName + "</td><td>" + 
                                element.price + "</td><td>" + 
                                element.startDate + "</td><td>" +
                                element.life + " Mesi </td><td>" +
                                "<button class=\"button\" onclick=\"unsubToStar(\'" + element.starID + "\');\">Disiscriviti</button></td></tr>"; 
            });

            document.getElementById("subs_table").innerHTML = outString;
            document.getElementById("numSub").innerHTML = countSub;
        }   

        if (<?php echo count($subs_list)?>)displayAllSubs();
    </script>
</html>
