<!DOCTYPE html>

<?php
    include_once dirname(__FILE__) . '/../../api/_utils/sessionControl.php';
    if($_SESSION['role']) header('Location: /admin/adminHome.php');
?>
<!------------------------------------------------------------------------------------------------------------>
<html lang="it">
    <head>
        <title> Home </title>
        <!-- CSS stylesheet -->
        <link rel="stylesheet" href="../_resources/style/test_bento.css">
        <link rel="stylesheet" href="../_resources/style/main.css">
    </head>
    <body> 
        <!-- navbar -->
        <?php include  dirname(__FILE__) . "/../_modules/navbar.php"; ?>

        <header class = "logo">
            <h1>Bentornato!</h1>
        </header>

        <section class="bento" id="home_options">
            <div class="grid1"><a href=myProfile.php> Il Mio Profilo</a></div>
            <div class="grid2"><a href=../stars/starList.php> Cerca Stelle</a></div>
            <div class="grid3"><a href=../constellation/consList.php> DA FINIRE</a></div>
        </section>

        <!-- footer -->
        <?php include  dirname(__FILE__) . "/../_modules/footer.html"; ?>
    </body>
</html>