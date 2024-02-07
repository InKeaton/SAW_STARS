<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <style>
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
        </style>
    </head>
    <body>
        <!-- navbar -->
        <?php include  dirname(__FILE__) . "/modules/navbar.php"; ?>
        <div id = "regDIV">
            <h1>FORM pe il LOGIN</h1>
            <hr>
            <form action="javascript:Login()" id = "login" method="post">
                <label>Email: </label><input type="email" name="email" required> <br>
                <label>Password: </label><input type="password" name="pass" required> <br>
                <input type="submit" name="submit" value="LOGIN">
            </form>
            <hr>
            <button  onclick="location.href='register.html'" > Register </a>
        </div>
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
  