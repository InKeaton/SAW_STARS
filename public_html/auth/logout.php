<!DOCTYPE html>

<html lang="it">
    <?php include_once dirname(__FILE__) . '/../../api/_utils/sessionControl.php';?>

    <head>
        <Title>Terima Sessione</Title>
        <!-- CSS stylesheet -->
        <link rel="stylesheet" href="../_resources/style/test_bento.css">
        <link rel="stylesheet" href="../_resources/style/main.css">
    </head>

    <body>
        <!-- navbar -->
        <?php include  dirname(__FILE__) . "/../_modules/navbar.php"; ?>

        <header class = "logo">
            <h1>Termina Sessione</h1>
        </header>

        <main class="main_container">
            <p class="confirmation"> Sicuro? </p>

            <form type="submit" action="javascript:Logout()" method="post">
                <fieldset>
                    <input type="submit" value="End Session">
                </fieldset>
            </form> 
        </main>
        <!-- footer -->
        <?php include  dirname(__FILE__) . "/../_modules/footer.html"; ?>
    </body>
<!------------------------------------------------------------------------------------------------------------>
    <script>
        async function Logout() {
            let response = await fetch('../../api/auth_api/logoutAPI.php', { method: 'POST'});
            result = await response.json();
            if(result.status == 200) 
                location.replace("../index.php"); 
            else 
                alert(result.message);
        }
    </script>
</html>