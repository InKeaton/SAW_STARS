<nav class="navbar_test">
    <?php
    // maybe switch to buttons
        if(!isset($_SESSION['uuid'])) {
            echo("<a class=\"navbar_right\" href=\"../auth/login.php\">       Accedi</a>");
            echo("<a class=\"navbar_right\" href=\"../auth/register.php\">    Registrati</a>");
        }
        else {
            echo("<a class=\"navbar_right\" href=\"../profile/home.php\">        Home</a>");
            echo("<a class=\"navbar_left\"  href=\"../stars/starList.php\">    Cerca una Stella</a>");
            echo("<a class=\"navbar_left\"  href=\"../profile/myProfile.php\">   Il mio Profilo</a>");
            echo("<a class=\"navbar_left\"  href=\"../auth/logout.php\">      Termina Sessione</a>");
        }
    ?>
</nav><br>