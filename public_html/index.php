<!DOCTYPE html>

<html lang="it">
    <head>
        <Title>Galileo</Title>
        <!-- CSS stylesheet -->
        <link rel="stylesheet" media="screen and (orientation: landscape)" href="_resources/style/landscape/details.css">
        <link rel="stylesheet" media="screen and (orientation: portrait)"  href="_resources/style/portrait/details.css">
    </head>

    <body>
        <nav class="navbar">
            <button class="navbar_right" onclick="location.href='profile/home.php';">         Home</button>
            <button class="navbar_left"  onclick="location.href='auth/login.php';">           Accedi</button>
            <button class="navbar_left"  onclick="location.href='auth/registration.php';">    Registrati</button>
        </nav><br>

        <header class="logo">
            <h1>Galileo</h1>
            <h2> <i>Save Our Stars</i></h2>
        </header>

        <section class="bento">
            <p>
                Everything begins from nothing
            </p> 
        </section>

        <!-- footer -->
        <?php include  dirname(__FILE__) . "/_modules/footer.html"; ?>
        
    </body>
</html>