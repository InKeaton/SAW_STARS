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
            <h1>Bentornato!</h1>
        </header>

        <section class="bento" id="home_options">
            <button class="grid10" onclick="location.href='../profile/myProfile.php';">Il Mio Profilo</button>
            <button class="grid5" onclick="location.href='../stars/starList.php';">Cerca Stelle</button>
            <button class="grid5" onclick="location.href='../constellation/consList.php';">Cerca Costellazioni</button>
        </section>

        <!-- footer -->
        <?php include  dirname(__FILE__) . "/../_modules/footer.html"; ?>
    </body>
</html>