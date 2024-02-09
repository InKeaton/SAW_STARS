<?php
    include_once dirname(__FILE__) .  '/../../api/_utils/sessionControl.php';
    include_once dirname(__FILE__) .  '/../../api/_model/User.php';
    $u = new User();
    $u->userID = $_SESSION['uuid'];
    $result = $u->Select()[0];
?>

<!DOCTYPE html>

<html>
    <head>
        <title> Update User </title>
    </head>
    <body>
        <!-- navbar -->
        <?php include  dirname(__FILE__) . "/../_modules/navbar.php"; ?>
        <div>
            <form action="javascript:Update()" id="update">
                Email <input name='email' type='email' value=<?php echo $result->email;?>><br>
                First Name <input name='firstname' type='text' value=<?php echo $result->firstName;?>><br>
                Last Name <input name='lastname' type='text' value=<?php echo $result->lastName;?>><br>
                CreateDate <input name="createDate" type="date" value=<?php echo date_format(date_create($result->createDate), 'Y-m-d');?>><br>
                <input type='submit'>
            </form>
        </div>
    </body>
    <script>
        async function Update() {
            const form = document.getElementById('update');
            let response = await fetch('../../api/user_api/updateUser.php', { method: 'POST', body : new FormData(form)});
            result = await response.json();
            if(result.status == 200)  alert("modifica avvenuta con successo");
        }
    </script>
</html>