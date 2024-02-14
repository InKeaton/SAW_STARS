<!DOCTYPE html>

<?php
    session_start()
?>
<!------------------------------------------------------------------------------------------------------------>
<html lang="it">
    <head>
        <title>Star Game</title>
        <link rel="stylesheet" media="screen and (orientation: landscape)" href="../_resources/style/landscape/game.css">
        <link rel="stylesheet" media="screen and (orientation: portrait)"  href="../_resources/style/portrait/game.css">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    </head>

    <body>
        <?php include  dirname(__FILE__) . "/../_modules/navbar.php"; ?>

        <audio controls autoplay loop hidden>
            <source src="_resource/sound/bkg_sound.mp3" type="audio/mpeg">
            Your browser does not support the audio element.
        </audio> 

        <div id="display">
            <section id = "intro">
                <h1>Cannoni Stellari</h1>
                <p>
                    Oh no!!! Una pioggia di stelle semi morenti sta cascando dal cielo <br>
                    Utilizza il tuo cannone ad idrogeno per poter far recuperare alle stelle <br>
                    la loro luminosità così da farle ritornare in cielo. </br>
                    Premi su uno dei riquadri presenti nel quadrante che comparirà di seguito <br>
                    per poter spostare il cannone e fargli sparare un colpo di idrogeno. <br>
                    Ma attento!! Non tutte le stelle sono uguali alcune hanno bisogno di ben più <br>
                    di un colpo per poter ritornare nel cielo. <br>
                </p>
                <h4>Si consiglia di usare il telefono orizzontalmente per fruire meglio del gioco</h4><br>
                <input type="submit" id="introButton" value = "Salva le Stelle!" onclick="Start">
            </section>
        </div>

        <?php include  dirname(__FILE__) . "/../_modules/footer.html"; ?>
        <?php include  dirname(__FILE__) . "/../_modules/modal.html"; ?>
    </body>
<!------------------------------------------------------------------------------------------------------------>
    <script src="./_class/GameElement.js"></script>
    <script src="./_class/ObjFab.js"></script>
    <script src="./_class/Player.js"></script>
    <script src="./_class/Star.js"></script>
    <script src="./_class/Bullet.js"></script>
    <script>
        document.getElementById("introButton").addEventListener("click", Start);
        function Start() {
            document.getElementById("display").innerHTML = "<div id='POINT'>" +
                                                                 "0" + 
                                                            "</div>" +
                                                            "<div class='mainDiv'>"+              
                                                                "<div  class='item' id='1'> </div>"+
                                                                "<div  class='item' id='2'></div>" +
                                                                "<div  class='item' id='3'></div>" +
                                                                "<div  class='item' id='4'></div>" +
                                                                "<div  class='item' id='5'></div>" +
                                                            "</div>";

            document.getElementById("1").addEventListener("click", GameElement.HandleClick);
            document.getElementById("2").addEventListener("click", GameElement.HandleClick);
            document.getElementById("3").addEventListener("click", GameElement.HandleClick);
            document.getElementById("4").addEventListener("click", GameElement.HandleClick);
            document.getElementById("5").addEventListener("click", GameElement.HandleClick);

            document.getElementById("1").addEventListener("touchend", GameElement.HandleClick);
            document.getElementById("2").addEventListener("touchend", GameElement.HandleClick);
            document.getElementById("3").addEventListener("touchend", GameElement.HandleClick);
            document.getElementById("4").addEventListener("touchend", GameElement.HandleClick);
            document.getElementById("5").addEventListener("touchend", GameElement.HandleClick);

            new Player();
            setInterval(Star.Spid, 10000);
            setInterval(Star.GenerateStar, Star.starTimeSpaw);
            setInterval(GameElement.Cicle, 60);
        }
    </script>
</html>