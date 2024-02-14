<!DOCTYPE html>
<html lang="it">
    <?php
        include_once dirname(__FILE__) .  '/../_api/_utils/sessionControl.php';
        include_once dirname(__FILE__) .  '/../_api/_model/User.php';
        $u = new User();
        $u->userID = $_SESSION['uuid'];
        $result = $u->Select()[0];
    ?>
<!------------------------------------------------------------------------------------------------------------>
    <head>
        <title> Aggiorna il Profilo </title>
        <!-- CSS stylesheet -->
        <link rel="stylesheet" media="screen and (orientation: landscape)" href="../_resources/style/landscape/form.css">
        <link rel="stylesheet" media="screen and (orientation: portrait)"  href="../_resources/style/portrait/form.css">
    </head>

    <body>
        <!-- navbar -->
        <?php include  dirname(__FILE__) . "/../_modules/navbar.php"; ?>

        <header class = "logo">
            <h1>Aggiorna la Password</h1>
        </header>

        <main class = "main_container">
            <form class = "form" action="javascript:Update()" id="update">
                <label>Vecchia Password: <br>
                    <input type="password" id="oldPass" autocomplete="current-password" name="oldPass" minlength="10">
                </label>
                <label>Nuova Password: <br>
                    <input type="password" id="pass" autocomplete="new-password" name="pass" minlength="10" placeholder="Almeno 10 caratteri">
                </label>
                <label>Conferma<br>
                    <input type="password" id="confirm" autocomplete="new-password" name="confirm" minlength="10" placeholder="Almeno 10 caratteri">
                </label>
                <input type='submit' value="Aggiorna">
            </form>
        </main>

        <!-- navbar -->
        <?php include  dirname(__FILE__) . "/../_modules/footer.html"; ?>
        <?php include  dirname(__FILE__) . "/../_modules/modal.html"; ?>
    </body>
<!------------------------------------------------------------------------------------------------------------>
    <script>
        async function Update() {
            const form = document.getElementById('update');
            let response = await fetch('../_api/user_api/updatePwd.php', { method: 'POST', body : new FormData(form)});
            result = await response.json();
            if(result.status == 200) location.replace("show_profile.php");
            else DisplayModal(0, result.message);
        }
    </script>
</html>
