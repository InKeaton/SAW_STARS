<nav>
    <?php
        if(!isset($_SESSION['uuid'])) {
            echo("<a href=\"login.php\">Accedi</a> |");
            echo("<a href=\"registration.php\">Registrati</a> |");
        }
        else {
            echo("<a href=\"home.php\">Home</a> |");
            echo("<a href=\"starList.php\">Cerca una Stella</a> |");
            echo("<a href=\"myProfile.php\">Il mio Profilo</a> |");
            echo("<a href=\"logout.php\">Termina Sessione</a> |");
        }
    ?>
</nav>