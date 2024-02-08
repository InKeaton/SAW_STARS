<!DOCTYPE html>

<html lang="it">

    <?php 
        // session/remember me check
        include_once dirname(__FILE__) . '/../../api/_utils/sessionControl.php';
    ?>
    <head>
        <Title>End Session</Title>
    </head>

    <body>

        <header class = "logo">
            <h1>End Session</h1>
        </header>

        <?php
            // navigation bar
            include  dirname(__FILE__)  . "/../_modules/navbar.php"; 
        ?>

        <main>
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

    <script>
            async function Logout() {
                let response = await fetch('../../api/auth_api/logoutAPI.php', { method: 'POST'});
                result = await response.json();
                if(result.status == 200) 
                    location.replace("../index.html"); 
                else 
                    alert(result.message);
            }
        </script>
</html>