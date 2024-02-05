<?php
    include_once dirname(__FILE__) . '/../utils/sessionControl.php';  
    include_once dirname(__FILE__) . '/../model/User.php';
    include_once dirname(__FILE__) . '/../model/Sub.php';
    include_once dirname(__FILE__) . '/../model/Star.php';

    $user = new User();
    $user->userID =  $_SESSION['uuid'];
    $profile = $user->Select()[0];

    $sub = new Sub();
    $sub->userFK = $_SESSION['uuid'];
    $subsResult = $sub->SelectUserSub();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>My Profile</title>
    </head>
    <?php
        // navigation bar
        include dirname(__FILE__) .  "/modules/navbar.php"; 
    ?>
    <body>
        <section id="user_info">
        User Email : <?php echo $profile->email ?> <br>
        User Name : <?php echo $profile->firstName ?> <br>
        User Surname : <?php echo $profile->lastName ?> <br>
        </section>
        Stars : <br>
        <section id="stars_info">
        </section>
        
    </body>

    <script>
        displayAllSubs();
        function displayAllSubs() {
            stars = <?php echo json_encode($subsResult);?>;
            outString = "<table><tr><th>Nome</th><th>Prezzo</th><th>Data d'inizio</th><th>Durata</th></tr>";
            stars.forEach(element => {
                outString += "<tr><td><a href=starDetails.php?starID=" + element.starID + ">" + element.starName + "</td><td>" + element.price + "</td><td>" + element.startDate + "</td><td>" + element.life + " Mesi </td></tr>";
            });
            outString += "</table>";
            document.getElementById("stars_info").innerHTML = outString;
        }   
        
    </script>

</html>