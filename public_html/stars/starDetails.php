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
    </head>
    <body>
        <!-- navbar -->
        <?php include  dirname(__FILE__) . "/../_modules/navbar.php"; ?>
        <section id="star_info">
            Star Name : <?php echo $starResult->starName ?> <br>
            Star Price : <?php echo $starResult->price?> <br>
            Star Distance Light Year : <?php echo $starResult->dLY?><br>
            Cons Name: <a href = "/public_html/constellation/consDetails.php?consID=<?php echo $starResult->consFK;?>">
                <?php echo $starResult->consName;?><br> </a>
            <form action="javascript:subToStar()" id = "subscribe" method="post">
                <label for="life">Durata Abbonamento (in Mesi):</label>
                <input type="number" id="life" name="life" min="1" max="12">
                <input type="hidden" id="starFK" name="starFK" value="<?php echo $_GET["starID"];?>">
                <input type="hidden" id="userFK" name="userFK" value="<?php echo $_SESSION["uuid"];?>">
                <input type="submit" name="submit" value="Abbonati!">
            </form><br>
        </section>
        <section id="reviews"></section>
    </body>
<!------------------------------------------------------------------------------------------------------------>
    <script>
        async function subToStar() {
            // MODIFY LATER TO AVOID USING TEMPORARY VARIABLES!!!
            let subscribeForm = document.getElementById('subscribe');
            let response = await fetch('../../api/sub_api/insertSub.php', { method: 'POST', 
                                                              body : new FormData(subscribeForm) 
                                                            });
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

            outString = "<div id=\"addMemoryForm\">" +
                            "<input id=\"addMemory\" type=\"button\" value=\"Condividi un tuo ricordo!\" onclick=\"displayReviewBox();\">" +
                        "</div>" +
                        "Ricordi: <br>" +
                            "<table id=\"reviews_list\">" +
                                "<tr>" +
                                    "<th>Utente</th>" +
                                    "<th>Voto</th>" +
                                    "<th>Ricordo</th>" +
                                    "<th>Data</th>" +
                            "</tr>";
            reviews.forEach(element => {
                outString += "<tr><td>" + element.firstName + "</td><td>" + element.vote + "</td><td>" + element.note + "</td><td>" + element.revDate + "</td></tr>";
            });
            outString += "</table>";
            document.getElementById("reviews").innerHTML = outString;
        };

        function returnButton() {
            document.getElementById("addMemoryForm").innerHTML ="<input id=\"addMemory\" type=\"button\" value=\"Condividi un tuo ricordo!\" onclick=\"displayReviewBox();\">";
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
            document.getElementById("addMemoryForm").innerHTML ="<form action=\"javascript:addMemory()\" id = \"review\" method=\"post\">" +
                                                                    "<input type=\"hidden\" id=\"starFK\" name=\"starFK\" value=\"<?php echo $_GET["starID"];?>\" >" +

                                                                    "<label for=\"vote\">Stelline (tra 1 e 5):</label>" +
                                                                    "<input type=\"number\" id=\"vote\" name=\"vote\" min=\"1\" max=\"5\"><br>" +

                                                                    "<textarea id=\"note\" name=\"note\" rows=\"10\" cols=\"115\"></textarea><br>" +

                                                                    "<input type=\"submit\" name=\"submit\" value=\"Invia il tuo ricordo!\">" +
                                                                "</form>" +
                                                                "<input id=\"addMemory\" type=\"button\" value=\"Annulla\" onclick=\"returnButton();\"></input>";
        };

        displayAllReviews();
    </script>
</html>
