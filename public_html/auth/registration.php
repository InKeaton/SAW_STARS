<!DOCTYPE html>
<html lang="it">
    <head>
        <title>Registrati</title>
        <link rel="stylesheet" media="screen and (orientation: landscape)" href="../_resources/style/landscape/form.css">
        <link rel="stylesheet" media="screen and (orientation: portrait)"  href="../_resources/style/portrait/form.css">
    </head>
    <body>
        <?php session_start() ?>
        <!-- navbar -->
        <?php include dirname(__FILE__) . "/../_modules/navbar.php"; ?>

        <header class = "logo">
            <h1>Registrati!</h1>
        </header>

        <main class = "main_container">
            <form class="form" type="submit" id="insert" action="javascript:Insert()">

                <label for="firstname">Nome<br>
                    <input type="text" id="firstname" name="firstname" placeholder="Your name.." value= "">
                </label>

                <label for="lastname">Cognome<br>
                    <input type="text" id="lastname" name="lastname" placeholder="Your surname.." value="">
                </label>

                <label for="email">Email<br>
                    <input type="email" id="email" name="email" placeholder="Your email.." value="">
                </label>

                <label for="pass">Password<br>
                    <input type="password" id="pass" name="pass" placeholder="Password" value="">
                </label>

                <label for="confirm">Conferma la Password<br>
                    <input type="password" id="confirm" name="confirm"  placeholder="Confirm password">
                </label>

                <input type="submit" value="Registrati">
            </form>
        </main>
        <!-- footer -->
    <?php include  dirname(__FILE__) . "/../_modules/footer.html"; ?>
    </body>
<!------------------------------------------------------------------------------------------------------------>
    <script>
        async function Insert() {
            const form = document.getElementById('insert');
            let response = await fetch('../_api/auth_api/registrationApi.php', { method: 'POST', body : new FormData(form) });
            result = await response.json();
            if(result.status == 200) location.replace("login.php");
            else alert("Errore nelal fase di insert della pagina");
        }
    </script>


</html>
