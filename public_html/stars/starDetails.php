<!DOCTYPE html>

<html lang='it'>
<?php
    include_once dirname(__FILE__) . '/../_api/_utils/sessionControl.php';  
    include_once dirname(__FILE__) . '/../_api/_model/Star.php';
    include_once dirname(__FILE__) . '/../_api/_model/Review.php';
    include_once dirname(__FILE__) . '/../_api/_model/Sub.php'; 
    // Get star and its constellation data
    $star = new Star();
    $star->starID =  $_GET['starID'];
    
    // if it is given a wrong id
    if(count($starResult = $star->SelectStarCons()) == 0) header('Location: starList.php');
    
    $starResult = $starResult[0];
    
    $sub = new Sub();
    $sub->starFK =  $_GET['starID'] ;
    $sub->userFK =  $_SESSION["uuid"];
    $isSub = count($sub->SelectUserSubStar());  

    // Get its memories
    $reviews = new Review();
    $reviews->starFK = $_GET['starID'] ;
    $reviews->userFK = $_SESSION["uuid"];
    $haveReview = count($reviews->SelectCountReview());

?>
<!------------------------------------------------------------------------------------------------------------>
    <head>
        <title>Scheda di <?php echo $starResult->starName ?> </title>
        <!-- CSS stylesheet -->
        <link rel="stylesheet" media="screen and (orientation: landscape)" href="../_resources/style/landscape/details.css">
        <link rel="stylesheet" media="screen and (orientation: portrait)"  href="../_resources/style/portrait/details.css">
    </head>
    <body>
        <!-- navbar -->
        <?php include  dirname(__FILE__) . "/../_modules/navbar.php"; ?>
        <header class = "logo">
            <h1>Scheda di <?php echo $starResult->starName ?></h1>
        </header> 
        <section class="bento" id="star_info">
            <article class="grid5">Nome:<br><?php echo $starResult->starName ?></article>
            <article class="grid5">Costellazione:<br><a href = "../constellation/consDetails.php?consID=<?php echo $starResult->consFK;?>"><?php echo $starResult->consName;?></a></article>
            <article class="grid3">Distanza:<br><?php echo $starResult->dLY?> anni luce</article>
            <article class="grid3">N° Iscritti:<br><?php echo ($sub->SelectCountStarSub())[0]->countSub; ?></article>
            <article class="grid2">N° Punti Ricevuti:<br><output id="sumStar"> </output></article>
            <article class="grid2">N° Ricordi Condivisi:<br><output id="revCount"> </output></article>
        </section>
    
        <?php if($isSub === 0) echo "   <section class='table_container' id='sub'>
                                            <h2> È questa la tua buona stella? </h2>
                                            <p> Abbonati per sostenerla <br>Costa solo ". $starResult->price ."€ al mese!</p><br>
                                            <form action='javascript:subToStar()' id = 'subscribe' method='post'>
                                            <label for='life'>Durata Abbonamento (in Mesi):
                                                <input type='number' id='life' name='life' min='1' max='12'>
                                            </label>
                                                <input type='hidden' id='starFK' name='starFK' value=". $_GET["starID"].">
                                                <input class='button' type='submit' name='submit' value='Abbonati!'>
                                            </form>
                                        </section>";

            ?>
        <?php if(($isSub !== 0) && ($haveReview === 0)) echo "  <section class='table_container' id='add_review'>
                                                                    <h2> <i>Rimembri ancora?</i> </h2>
                                                                    <p> Condividi ricordi su questa stella</p><br>
                                                                    <button class='button' onclick='javascript:displayReviewBox();'>Condividi un tuo ricordo!</button>
                                                                </section> ";
        ?>

        <div id="reviews_list"></div>
        <?php include_once  dirname(__FILE__) . "/../_modules/footer.html";?>
        <?php include_once  dirname(__FILE__) . "/../_modules/modal.html"; ?>
    </body>
<!------------------------------------------------------------------------------------------------------------>
 <script>
        async function subToStar() {
            let subscribeForm = document.getElementById('subscribe');
            let response = await fetch('../_api/sub_api/insertSub.php', { method: 'POST', body : new FormData(subscribeForm) });
            let result = await response.json();
            if(result.status == 200) location.reload();
            else  DisplayModal(0, result.message);
        }

        async function addMemory() {
            let reviewForm = document.getElementById('review');
            let response = await fetch('../_api/review_api/insertReview.php', { method: 'POST', body : new FormData(reviewForm) });
            result = await response.json();
            if(result.status == 200){
                location.reload();
            } else  DisplayModal(0, result.message);
        }

        function returnButton() {
            document.getElementById("add_review").innerHTML =   "<h2> <i>Rimembri ancora?</i> </h2>" +
                                                                "<p> Condividi ricordi su questa stella</p><br>" +
                                                                "<button class='button' onclick='javascript:displayReviewBox();'>Condividi un tuo ricordo!</button>";
                                                                
        }

        function displayAllReviews() {
            var reviews = <?php echo json_encode($reviews->SelectStarReviews());?>;
            var countStar = 0;
            outString = "<section class=\"table_container\" id=\"reviews\">" +
                            "<h2> Ricordi</h2>" +
                            "<table class=\"table\">" +
                            "<tr>" + "<th>Utente</th>" + "<th>Voto</th>" + "<th>Ricordo</th>" + "<th>Data</th>" + "</tr>";
            reviews.forEach(element => {
                countStar +=  element.vote;
                outString += "<tr><td>" + element.email + "</td><td>" + element.vote + "</td><td>" + element.note + "</td><td>" + element.revDate + "</td></tr>";
            });
            outString += "</table></section>"
            console.log("countStar: " + countStar + " || " + reviews.length );
            document.getElementById("reviews_list").innerHTML = outString;
            document.getElementById("sumStar").value = countStar.toString();
        }
        
        function displayReviewBox() {
            document.getElementById("add_review").innerHTML =   "<form action= 'javascript:addMemory()' id = 'review' method='post'>" +
                                                                    "<h2>Scrivi!</h2>" +
                                                                    "<input type='hidden' id='starFK' name='starFK' value='<?php echo $_GET["starID"];?>'>" +
                                                                    "<label for='vote'>Voto (tra 1 e 5):<br>" +
                                                                        "<input type='number' id='vote' name='vote' min='1' max='5'></label><br>" +
                                                                    "<label for='note'>Scrivi il tuo ricordo:<br>" +
                                                                        "<textarea class= 'comment' id='note' maxlength='1000' name='note' rows='10' cols='80'></textarea></label>" +
                                                                    "<input type='submit' name='submit' value='Invia il tuo ricordo!'>" +
                                                                "</form>" +
                                                                "<button class='button' onclick='javascript:returnButton()'> Annulla</button>";
        }
        document.getElementById("sumStar").innerHTML = 0;
        document.getElementById("revCount").innerHTML = <?php echo $haveReview?>;
        if(<?php echo $haveReview?>) displayAllReviews();
    </script>
</html>
