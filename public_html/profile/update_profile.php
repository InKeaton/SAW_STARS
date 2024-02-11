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
        <link rel="stylesheet" href="../_resources/style/form.css">
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
        </main>
    </body>
<!------------------------------------------------------------------------------------------------------------>
    <script>
        async function Update() {
            const form = document.getElementById('update');
            let response = await fetch('../_api/user_api/updateUser.php', { method: 'POST', body : new FormData(form)});
            result = await response.json();
            console.log(result);
            if(result.status == 200){
                alert("Modifica avvenuta con successo");
                location.replace("show_profile.php");
            }  
            else alert("Errore durante l'aggiornamento: riprovare");
        }
    </script>
</html>
