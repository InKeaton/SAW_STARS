<!DOCTYPE html>

<html>
    <body>
        <!-- navbar -->
        <?php include  dirname(__FILE__) . "/modules/navbar.php"; ?>
        <form type="submit" id="insert" action="javascript:Insert()">
            <fieldset>
                <legend>Insert your data to create your new account!</legend>

                <label for="firstname">Name </label>
                <input type="text" id="firstname" name="firstname" placeholder="Your name.." value= "asd"><br>

                <label for="lastname">Surname </label>
                <input type="text" id="lastname" name="lastname" placeholder="Your surname.." value="asd"><br>

                <label for="email">Email </label>
                <input type="email" id="email" name="email" placeholder="Your email.." value=""><br>

                <label for="pass">Password </label>
                <input type="password" id="pass" name="pass" placeholder="Password" value="pr"><br>

                <label for="confirm">Confirm Password </label>
                <input type="password" id="confirm" name="confirm"  placeholder="Confirm password"><br>

                <input type="submit" value="Registrati">
            </fieldset>
        </form>
    </body>
<!------------------------------------------------------------------------------------------------------------>
    <script>
        async function Insert() {
            const form = document.getElementById('insert');
            let response = await fetch('api/registration.php', { method: 'POST', body : new FormData(form) });
            result = await response.json();
            if(result.status == 200) location.replace("/public_html/login.html");
            alert(result.message);
        }
    </script>


</html>
