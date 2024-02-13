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
            <h1>Aggiorna il Profilo</h1>
        </header>

        <main class = "main_container">
            <form class = "form" action="javascript:Update()" id="update">
                <label for="email">Email<br>
                    <input type="email" id="email" name="email" value=<?php echo $result->email;?>>
                </label>

                <label for="firstname">Nome<br>
                    <input type="text" id="firstname" name="firstname" value=<?php echo $result->firstName;?>>
                </label>

                <label for="lastname">Cognome<br>
                    <input type="text" id="lastname" name="lastname" value=<?php echo $result->lastName;?>>
                </label>

                <input type='submit' value="Aggiorna">
            </form>
            <a href="update_pwd.php">   Modifica password   </a>
        </main>

        <!-- navbar -->
        <?php include  dirname(__FILE__) . "/../_modules/footer.html"; ?>
        <?php include  dirname(__FILE__) . "/../_modules/modal.html"; ?>
    </body>
<!------------------------------------------------------------------------------------------------------------>
    <script>
        async function Update() {
            const form = document.getElementById('update');
            let response = await fetch('../_api/user_api/updateUser.php', { method: 'POST', body : new FormData(form)});
            result = await response.json();
            if(result.status == 200){
                location.replace("show_profile.php");
            }  
            else DisplayModal(0, result.message);
        }
    </script>
</html>
