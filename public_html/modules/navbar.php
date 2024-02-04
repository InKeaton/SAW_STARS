<nav>
    <?php
        if(!isset($_SESSION['uuid'])) {
            echo("<a href=\"login.html\">Accedi</a> |");
            echo("<a href=\"registration.html\">Registrati</a> |");
        }
        else {
            echo("<a href=\"home.php\">Home</a> |");
            echo("<a href=\"starList.php\">Cerca una Stella</a> |");
            echo("<a href=\"myProfile.php\">Il mio Profilo</a> |");
            echo("<a href=\"logout.php\">Termina Sessione</a> |");
        }
    ?>
</nav>