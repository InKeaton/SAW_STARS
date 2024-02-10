<nav class="navbar_test">
    <?php
    // maybe switch to buttons
        if(!isset($_SESSION['uuid'])) {
            echo("<button class=\"navbar_right\" onclick=\"location.href='../auth/login.php';\">       Accedi</button>");
            echo("<button class=\"navbar_right\" onclick=\"location.href='../auth/register.php';\">    Registrati</button>");
        }
        else {
            echo("<button class=\"navbar_right\" onclick=\"location.href='../profile/home.php';\">       Home</button>");
            echo("<button class=\"navbar_left\"  onclick=\"location.href='../stars/starList.php';\">     Cerca una Stella</button>");
            echo("<button class=\"navbar_left\"  onclick=\"location.href='../profile/myProfile.php';\">   Il mio Profilo</button>");
            echo("<button class=\"navbar_left\"  onclick=\"location.href='../auth/logout.php';\">     Termina Sessione</button>");
        }
    ?>
</nav><br>