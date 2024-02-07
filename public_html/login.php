<!DOCTYPE html>
<?php session_start() ?>
<html lang="it">
    <head>
        <title>Accedi</title>
        <link rel="stylesheet" href="style/main.css">
        <!-- <style>
            #regDIV {
                position: absolute;
                width: 30%;
                height: 50%;
                top: 25%;
                left: 35%;
                border: 2px;
                border-color: black;
                border-style: solid;
            }
            #regDIV > form {  
                width: 100%; 
            }
            form > label {width: 20%;}
            form > input {width: 80%;}
        </style> -->
    </head>
    <body>
        <!-- navbar -->
        <?php include  dirname(__FILE__) . "/modules/navbar.php"; ?>

        <header class = "logo">
            <h1>Accedi!</h1>
        </header>

        <main class = "main_container">
            <form class = "login_form" action="javascript:Login()" id = "login" method="post">
                <label>Email </label><br>
                <input type="email" name="email" required> <br>

                <label>Password </label><br>
                <input type="password" name="pass" required> <br>

                <input type="submit" name="submit" value="LOGIN">
            </form>
            <hr class = "sepline">
            <button onclick="location.href='register.php'" > Register </a>
        </main>
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
  