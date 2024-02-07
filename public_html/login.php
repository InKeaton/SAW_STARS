<!DOCTYPE html>
<?php session_start() ?>
<html lang="it">
    <head>
        <title>Accedi</title>
        <!-- CSS stylesheet -->
        <link rel="stylesheet" href="style/main.css">
    </head>
    <body>
        <!-- navbar -->
        <?php include  dirname(__FILE__) . "/modules/navbar.php"; ?>

        <header class = "logo">
            <h1>Accedi!</h1>
        </header>

        <main class = "main_container">
            <form class = "form" action="javascript:Login()" id = "login" method="post">
                <label>Email </label><br>
                <input type="email"    name="email"  required> <br>

                <label>Password </label><br>
                <input type="password" name="pass"   required> <br>

                <input type="submit"   name="submit" value="Accedi">
            </form>
            <aside class="register_link">
            Non hai ancora un account? <br><a href="register.php"> Iscriviti alla nostra iniziativa!</a>
            </aside>
        </main>
        <!-- footer -->
        <?php include  dirname(__FILE__) . "/modules/footer.html"; ?>
    </body>
<!------------------------------------------------------------------------------------------------------------>
    <script>
        async function Login() {
            const form = document.getElementById('login')
            let response = await fetch( 'api/login.php', { method: 'POST', body : new FormData(form) });
            result = await response.json();
            if(result.status == 200) 
                location.replace("home.php"); 
            else 
                alert(result.message);
        }
    </script>
</html>
  