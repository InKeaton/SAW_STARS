<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/utils/sessionControl.php';  
    include_once $_SERVER['DOCUMENT_ROOT'] . '/model/Star.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/model/Constellation.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/model/Review.php';
    
    $star = new Star();
    $star->starID =  $_GET['starID'] ;
    $starResult = $star->Select()[0];

    $cons = new Constellation();
    $cons->consID = $starResult->consFK;
    $consResult =   $cons->Select()[0]; 

    $review = new Review();
    $review->starFK = $_GET['starID'];
    $reviewResult = $review->SelectStarReviews();
?>

<!DOCTYPE html>

<html>
    <head>
        <title></title>
    </head>
    <body>
        <?php
            // navigation bar
            include  $_SERVER['DOCUMENT_ROOT'] . "/public_html/modules/navbar.php"; 
        ?>
        <section id="star_info">
            Star Name : <?php echo $starResult->starName ?> <br>
            Star Price : <?php echo $starResult->price?> <br>
            Star Distance Light Year : <?php echo $starResult->dLY?><br>
            Cons Name: <a href = "/public_html/consDetails.php?consID=<?php echo $consResult->consID;?>">
                <?php echo $consResult->consName;?><br> </a>
        </section>
        Ricordi: <br>
        <section id="reviews_info">
        </section>
    </body>
    <script>
        displayAllReviews();
        function displayAllReviews() {
            reviews = <?php echo json_encode($reviewResult);?>;
            console.log(reviews);
            outString = "<table><tr><th>Utente</th><th>Voto</th><th>Ricordo</th><th>Data</th></tr>";
            reviews.forEach(element => {
                outString += "<tr><td>" + element.firstName + "</td><td>" + element.vote + "</td><td>" + element.note + "</td><td>" + element.revDate + "</td></tr>";
            });
            outString += "</table>";
            document.getElementById("reviews_info").innerHTML = outString;
        }   
    </script>
</html>
