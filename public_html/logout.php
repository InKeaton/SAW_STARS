<!DOCTYPE html>

<html lang="it">

    <?php 
        // session/remember me check
        include_once $_SERVER['DOCUMENT_ROOT'] . '/utils/sessionControl.php';
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
            include  $_SERVER['DOCUMENT_ROOT'] . "/public_html/modules/navbar.php"; 
        ?>

        <main>
            <p class="confirmation"> Sicuro? </p>

            <form type="submit" action="javascript:Logout()" method="post">
                <fieldset>
                    <input type="submit" value="End Session">
                </fieldset>
            </form> 
        </main>

        <script>
            async function Logout() {
                let response = await fetch('/api/logout.php', { method: 'POST'});
                result = await response.json();
                if(result.status == 200) 
                    location.replace("/public_html/index.html"); 
                else 
                    alert(result.message);
            }
        </script>

        <?php
            // footer
            include $_SERVER['DOCUMENT_ROOT'] . "/public_html/modules/footer.html"; 
        ?>
    </body>
</html>