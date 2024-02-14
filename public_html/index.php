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
            <button class="navbar_left" onclick="location.href='profile/home.php';">         Home</button>
            <button class="navbar_right"  onclick="location.href='auth/login.php';">           Accedi</button>
            <button class="navbar_right"  onclick="location.href='auth/registration.php';">    Registrati</button>
        </nav><br>

        <header class="logo">
            <h1>Galileo</h1>
            <h2> <i>Salviamo le Stelle!</i></h2>
        </header>

        <section class="bento">
            <article class="grid2">
                <h2>Le Stelle?</h2>
                <p>Tutti noi amiamo questi grandi reattori di fusione nucleare che decorano il cielo notturno</p>
            </article>
            <article class="grid4">
                <h2>Il Problema?</h2>
                <p>Come tutte le cose nell'universo, esse non sono eterne, e tutte si spegneranno, prima o poi... :(</p>
            </article>
            <article class="grid4">
                <h2>La Soluzione?</h2>
                <p>Fortunatamente la nostra startup ha creato cannoni sperimentali, capaci di rifornire di idrogeno le stelle bisognose :)</p>
            </article>
            <article class="grid10">
                <h2>Ed io cosa c'entro?</h2>
                <p>I cannoni costano! Partecipando al progetto Galileo, potrai finanziare i nostri piani di guargione siderale!</p>
            </article>
        </section>

        <h2 class="logo">Come funziona?</h2>

        <section class="table_container">
            <article class="grid10">
                <h2>Cerca!</h2>
                <p>Cerca nel nostro database di stelle, sempre in crescita, il tuo astro del cuore. </p>
            </article>
            <article class="grid10">
                <h2>Abbonati!</h2>
                <p>Abbonati alla stella, e sostienila mensilmente! Per ogni donazione, sarà inviata una cannonata di idrogeno </p>
            </article>
            <article class="grid10">
                <h2>Condividi un Ricordo!</h2>
                <p>Lasciaci un tuo ricordo di quella stella. Aggiungi un voto, che ci aiuterà a decidere quali stelle sono più ben volute</p>
            </article>
        </section>

        <section class="bento">
            <article class="grid10">
                <h2>Ti abbiamo convinto?</h2>
                <p>Unisciti subito a noi!</p>
                <button class="button" onclick="location.href='auth/login.php';">Accedi</button>
            </article>
        </section>

        

        <!-- footer -->
        <?php include  dirname(__FILE__) . "/_modules/footer.html"; ?>
        
    </body>
</html>