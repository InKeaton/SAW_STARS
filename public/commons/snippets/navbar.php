<nav>
    | <a href="index.php">Index</a> |
    <?php
        if(isset($_SESSION["email"])) {
            echo("<a href=\"my_profile.php\">My Profile</a> |");
            echo("<a href=\"unlogin.php\">End Session</a> |");
        }
        else {
            echo("<a href=\"login.php\">Login</a> |");
            echo("<a href=\"registration.php\">Register</a> |");
        }
    ?>
</nav>