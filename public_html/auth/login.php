<!DOCTYPE html>

<?php
    session_start();
    if(isset($_SESSION['uuid']))
        header("Location: ../profile/home.php");
?>

<html lang="it">
    <head>
        <title>Accedi</title>
        <!-- CSS stylesheet -->
        <link rel="stylesheet" media="screen and (orientation: landscape)" href="../_resources/style/landscape/form.css">
        <link rel="stylesheet" media="screen and (orientation: portrait)"  href="../_resources/style/portrait/form.css">
    </head>
    <body>
        <!-- navbar -->
        <?php include  dirname(__FILE__) . "/../_modules/navbar.php";?>

        <header class = "logo">
            <h1>Accedi!</h1>
        </header>

        <main class = "main_container">
            <form class = "form" action="javascript:Login()" id = "login" method="post">
                <label>Email <br>
                    <input type="email"  maxlength="50" name="email"  required> <br>
                </label>

                <label>Password <br>
                    <input type="password" name="pass"   required> <br>
                </label>

                <input type="submit"   name="submit" value="Accedi">
            </form>
            <aside class="register_link">
            Non hai ancora un account? <br><a href="registration.php"> Iscriviti alla nostra iniziativa!</a>
            </aside>
        </main>
        <!-- footer -->
        <?php include  dirname(__FILE__) . "/../_modules/footer.html"; ?>
        <?php include  dirname(__FILE__) . "/../_modules/modal.html"; ?>
    </body>
<!------------------------------------------------------------------------------------------------------------>
    <script>
        async function Login() {
            const form = document.getElementById('login')
            let response = await fetch( '../_api/auth_api/loginApi.php', { method: 'POST', body : new FormData(form) });
            result = await response.json();
            if(result.status == 200) 
                location.replace("../profile/home.php"); 
            else DisplayModal(0, result.message);
        }
    </script>
</html>
  
