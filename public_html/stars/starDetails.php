<!DOCTYPE html>

<html lang='it'>
<?php
    include_once dirname(__FILE__) . '/../../api/_utils/sessionControl.php';  
    include_once dirname(__FILE__) . '/../../api/_model/Star.php';
    include_once dirname(__FILE__) . '/../../api/_model/Review.php';
    
    // Get star and its constellation data
    $star = new Star();
    $star->starID =  $_GET['starID'] ;
    $starResult = $star->SelectStarCons()[0];

    // Get its memories
    $reviews = new Review();
    $reviews->starFK = $_GET['starID'] ;
    $reviews_list = $reviews->SelectStarReviews();
?>
<!------------------------------------------------------------------------------------------------------------>
    <head>
        <title>Scheda di <?php echo $starResult->starName ?> </title>
        <!-- CSS stylesheet -->
        <link rel="stylesheet" href="../_resources/style/details.css">
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
            <article class="grid3">N° Iscritti:<br>DA FARE</article>
            <article class="grid2">N° Stelline Ricevute:<br>DA FARE</article>
            <article class="grid2">N° Ricordi Condivisi:<br>DA FARE</article>
            <article class="grid10">
                <form action="javascript:subToStar()" id = "subscribe" method="post">
                    <label for="life">Durata Abbonamento (in Mesi):</label>
                    <input type="number" id="life" name="life" min="1" max="12">
                    <input type="hidden" id="starFK" name="starFK" value="<?php echo $_GET["starID"];?>">
                    <input type="hidden" id="userFK" name="userFK" value="<?php echo $_SESSION["uuid"];?>">
                    <input type="submit" name="submit" value="Abbonati!">
                </form>
            </article>
        </section>

        <section class="table_container"id="add_review">
            <input id="addMemory" type="button" value="Condividi un tuo ricordo!" onclick="displayReviewBox();">
        </section>

        <section class="table_container"id="reviews">
            <h2> Ricordi</h2>
            <table class="table" id="reviews_list"></table>
        </section>
        <!-- footer -->
        <?php include  dirname(__FILE__) . "/../_modules/footer.html";?>
    </body>
<!------------------------------------------------------------------------------------------------------------>
    <script>
        async function subToStar() {
            // MODIFY LATER TO AVOID USING TEMPORARY VARIABLES!!!
            let subscribeForm = document.getElementById('subscribe');
            let response = await fetch('../../api/sub_api/insertSub.php', { method: 'POST', body : new FormData(subscribeForm) });
            let result = await response.json();

            if(result.status == 200){
                alert("Abbonamento eseguito con successo!")
                return;
            } else {
                alert("Errore nella sottoscrizione")
            };
        }

        async function displayAllReviews() {
            reviews = subs = <?php echo json_encode($reviews_list);?>;

            outString = "<tr>" +
                            "<th>Utente</th>" +
                            "<th>Voto</th>" +
                            "<th>Ricordo</th>" +
                            "<th>Data</th>" +
                        "</tr>";
            reviews.forEach(element => {
                outString += "<tr><td>" + element.firstName + "</td><td>" + element.vote + "</td><td>" + element.note + "</td><td>" + element.revDate + "</td></tr>";
            });
            document.getElementById("reviews_list").innerHTML = outString;
        };

        function returnButton() {
            document.getElementById("add_review").innerHTML ="<input id=\"addMemory\" type=\"button\" value=\"Condividi un tuo ricordo!\" onclick=\"displayReviewBox();\">";
        };
        
        async function addMemory() {
            // MODIFY LATER TO AVOID USING TEMPORARY VARIABLES!!!
            let reviewForm = document.getElementById('review');
            let response = await fetch('../../api/review_api/insertReview.php', { method: 'POST', 
                                                              body : new FormData(reviewForm) 
                                                            });
            result = await response.json();
            
            if(result.status == 200){
                alert("Ricordo inserito con successo!")
                // generate new row to insert
                let new_review = document.getElementById("reviews_list").insertRow(1);
                let user = new_review.insertCell(0);
                let vote = new_review.insertCell(1);
                let note = new_review.insertCell(2);
                let date = new_review.insertCell(3);
                
                // TO FIX USER NAME RETRIVAL
                user.innerHTML = "Tu";
                vote.innerHTML = document.getElementById('vote').value;
                note.innerHTML = document.getElementById('note').value;
                date.innerHTML = new Date().toISOString().slice(0, 10).toString();
                returnButton();

                return;

            } else {alert("Errore nell'inserimento del ricordo")};
        };

        function displayReviewBox() {
            document.getElementById("add_review").innerHTML ="<form action=\"javascript:addMemory()\" id = \"review\" method=\"post\">" +
                                                                    "<input type=\"hidden\" id=\"starFK\" name=\"starFK\" value=\"<?php echo $_GET["starID"];?>\" >" +

                                                                    "<label for=\"vote\">Stelline (tra 1 e 5):</label>" +
                                                                    "<input type=\"number\" id=\"vote\" name=\"vote\" min=\"1\" max=\"5\"><br>" +

                                                                    "<textarea id=\"note\" name=\"note\" rows=\"10\" cols=\"80\"></textarea><br>" +

                                                                    "<input type=\"submit\" name=\"submit\" value=\"Invia il tuo ricordo!\">" +
                                                                "</form>" +
                                                                "<input id=\"addMemory\" type=\"button\" value=\"Annulla\" onclick=\"returnButton();\"></input>";
        };

        displayAllReviews();
    </script>
</html>
