<!DOCTYPE html>

<?php
    session_start();
    if(isset($_SESSION['uuid']))
        header("Location: ../profile/home.php");
?>

<html lang="it">
    <head>
        <title>Registrati</title>
        <link rel="stylesheet" media="screen and (orientation: landscape)" href="../_resources/style/landscape/form.css">
        <link rel="stylesheet" media="screen and (orientation: portrait)"  href="../_resources/style/portrait/form.css">
    </head>
    <body>
        <!-- navbar -->
        <?php include dirname(__FILE__) . "/../_modules/navbar.php"; ?>

        <header class = "logo">
            <h1>Registrati!</h1>
        </header>

        <main class = "main_container">
            <form class="form" type="submit" id="insert" action="javascript:Insert()">

                <label for="firstname">Nome<br>
                    <input type="text" id="firstname" name="firstname" maxlength="50">
                </label>

                <label for="lastname">Cognome<br>
                    <input type="text" id="lastname" name="lastname" maxlength="50">
                </label>

                <label for="email">Email<br>
                    <input type="email" id="email" name="email" maxlength="50">
                </label>

                <label for="pass">Password<br>
                    <input type="password" id="pass" name="pass">
                </label>

                <label for="confirm">Conferma la Password<br>
                    <input type="password" id="confirm" name="confirm">
                </label>

                <input type="submit" value="Registrati">
            </form>
        </main>
        <!-- footer -->
    <?php include  dirname(__FILE__) . "/../_modules/footer.html"; ?>
     <?php include  dirname(__FILE__) . "/../_modules/modal.html"; ?>
    </body>
<!------------------------------------------------------------------------------------------------------------>
    <script>
        async function Insert() {
            const form = document.getElementById('insert');
            let response = await fetch('../_api/auth_api/registrationApi.php', { method: 'POST', body : new FormData(form) });
            result = await response.json();
            if(result.status == 200) location.replace("login.php");
            else DisplayModal(0, result.message);
        }
    </script>


</html>
