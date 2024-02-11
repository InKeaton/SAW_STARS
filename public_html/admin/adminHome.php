<?php
    include_once dirname(__FILE__) .  '/../_api/_utils/sessionAdControl.php';
?>

<!DOCTYPE html>

<html lang="it">
    <head>
        <title> Home </title>
        <!-- CSS stylesheet -->
        <link rel="stylesheet" href="../_resources/style/details.css">
    </head>
    <body> 
        <!-- navbar -->
        <?php include  dirname(__FILE__) . "/../_modules/navbar.php"; ?>

        <header class = "logo">
            <h1>Bentornato, Amministratore!</h1>
            <h2> Cosa devi controllare oggi?</h2>
        </header>

        <section class="bento" id="home_options">
            <button class="grid5" onclick="location.href='user/adminUser.php';">Utenti</button>
            <button class="grid5" onclick="location.href='star/adminStar.php';">Stelle</button>
            <button class="grid3" onclick="location.href='sub/adminSub.php';">Abbonamenti</button>
            <button class="grid4" onclick="location.href='constellation/adminConstellation.php';">Costellazioni</button>
            <button class="grid3" onclick="location.href='review/adminReview.php';">Ricordi</button>
        </section>

        <!-- footer -->
        <?php include  dirname(__FILE__) . "/../_modules/footer.html"; ?>
    </body>
</html>