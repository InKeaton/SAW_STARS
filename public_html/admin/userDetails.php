<?php
    session_start();
    include_once dirname(__FILE__) .  '/../../model/User.php';
    $usr = new User();
    $usr->userID = $_GET['userID'];
    $result = $usr->Select()[0];
?>


<!DOCTYPE html>

<html>
    <head>
    </head>
    <body>
        <form action="javascript:Update()" id="update">
            <input type='hidden' value = "<?php echo $result->userID; ?>" name="userID">
            <label> Firstname: </label> 
                <input name = "firstname" type="text" value = "<?php echo $result->firstName;?>"> <br>
            <label> Lastname:  </label> 
                <input name="lastname" type="text" value = "<?php echo $result->lastName;?>"> <br>
            <label> Email: </label> 
                <input name="email" type="email" value = "<?php echo $result->email; ?>"> <br>
            <label> Create Data: </label> 
                <input name="createDate" type="date"  value=<?php echo date_format(date_create($result->createDate), 'Y-m-d');?> > <br> 
            <label> Password </label>
                <input name="pass" type="password" value="<?php echo $result->pwd; ?>"> <br>
            <label> Confirm </label>
                <input name="confirm" type="password" valeu="confirm">    <br>
            <input type="submit" value="update">
        </form>    
    </body>
    <script>
        async function Update() {
            const form = document.getElementById("update");
            const response = await fetch("../api/adminUpdateUser.php", {method: 'POST', body: new FormData(form)});
            const result = await response.json();
            console.log(result.status);
        }
    </script>
</html>