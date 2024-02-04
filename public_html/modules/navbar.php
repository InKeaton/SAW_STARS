<nav>
    | <a href="index.php">Index</a> |
    <?php
        if(!isset($_SESSION['uuid'])) {
            echo("<a href=\"login.html\">Accedi</a> |");
            echo("<a href=\"registration.html\">Registrati</a> |");
        }
        else {
            echo("<a href=\"logout.php\">Termina Sessione</a> |");
        }
    ?>
</nav>