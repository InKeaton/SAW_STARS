<!DOCTYPE html>
<html lang='it'>
<?php
    include_once dirname(__FILE__) . '/../utils/sessionControl.php';  
    include_once dirname(__FILE__) . '/../model/Star.php';
    include_once dirname(__FILE__) . '/../model/Constellation.php';
    
    $star = new Star();
    $star->starID =  $_GET['starID'] ;
    $starResult = $star->Select()[0];

    $cons = new Constellation();
    $cons->consID = $starResult->consFK;
    $consResult =   $cons->Select()[0]; 
?>
<!------------------------------------------------------------------------------------------------------------>
    <head>
        <title></title>
    </head>
    <body>
        <?php
            // navigation bar
            include dirname(__FILE__) . "/modules/navbar.php"; 
        ?>
        <section id="star_info">
            Star Name : <?php echo $starResult->starName ?> <br>
            Star Price : <?php echo $starResult->price?> <br>
            Star Distance Light Year : <?php echo $starResult->dLY?><br>
            Cons Name: <a href = "/public_html/consDetails.php?consID=<?php echo $consResult->consID;?>">
                <?php echo $consResult->consName;?><br> </a>
            <form action="javascript:subToStar()" id = "subscribe" method="post">
                <label for="life">Durata Abbonamento (in Mesi):</label>
                <input type="number" id="life" name="life" min="1" max="12">
                <input type="hidden" id="starFK" name="starFK" value="<?php echo $_GET["starID"];?>">
                <input type="hidden" id="userFK" name="userFK" value="<?php echo $_SESSION["uuid"];?>">
                <input type="submit" name="submit" value="Abbonati!">
            </form><br>
        </section>
        <section id="reviews">
        </section>
    </body>
<!------------------------------------------------------------------------------------------------------------>
    <script>
        async function subToStar() {
            // MODIFY LATER TO AVOID USING TEMPORARY VARIABLES!!!
            let subscribeForm = document.getElementById('subscribe');
            let response = await fetch('api/insertSub.php', { method: 'POST', 
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
            // MODIFY LATER TO AVOID USING TEMPORARY VARIABLES!!!
            let response = await fetch('api/getStarReview.php', { method: 'POST', 
                                                                  headers: { "Content-type": "application/x-www-form-urlencoded" },
                                                                  body : new URLSearchParams({
                                                                    'starFK': '<?php echo $_GET['starID']?>',
                                                                  })});
            let reviews = await response.json();

            outString = "<div id=\"addMemoryForm\">" +
                            "<input id=\"addMemory\" type=\"button\" value=\"Condividi un tuo ricordo!\" onclick=\"displayReviewBox();\">" +
                        "</div>" +
                        "Ricordi: <br>" +
                        "<section id=\"reviews_list\">" +
                            "<table>" +
                                "<tr>" +
                                    "<th>Utente</th>" +
                                    "<th>Voto</th>" +
                                    "<th>Ricordo</th>" +
                                    "<th>Data</th>" +
                            "</tr>" +
                        "</section>";
            reviews.forEach(element => {
                outString += "<tr><td>" + element.firstName + "</td><td>" + element.vote + "</td><td>" + element.note + "</td><td>" + element.revDate + "</td></tr>";
            });
            outString += "</table>";
            document.getElementById("reviews").innerHTML = outString;
        };
        
        async function addMemory() {
            // MODIFY LATER TO AVOID USING TEMPORARY VARIABLES!!!
            let reviewForm = document.getElementById('review');
            let response = await fetch('api/addReview.php', { method: 'POST', 
                                                              body : new FormData(reviewForm) 
                                                            });
            result = await response.json();
            
            if(result.status == 200){
                alert("Ricordo inserito con successo!")
                displayAllReviews();
                return;
            } else {
                alert("Errore nell'inserimento del ricordo")
            };
        };

        function displayReviewBox() {
            document.getElementById("addMemoryForm").innerHTML ="<form action=\"javascript:addMemory()\" id = \"review\" method=\"post\">" +
                                                                    "<input type=\"hidden\" id=\"starFK\" name=\"starFK\" value=\"<?php echo $_GET["starID"];?>\" >" +

                                                                    "<label for=\"vote\">Stelline (tra 1 e 5):</label>" +
                                                                    "<input type=\"number\" id=\"reviewVote\" name=\"vote\" min=\"1\" max=\"5\"><br>" +

                                                                    "<textarea id=\"note\" name=\"note\" rows=\"10\" cols=\"115\"></textarea><br>" +

                                                                    "<input type=\"submit\" name=\"submit\" value=\"Invia il tuo ricordo!\">" +
                                                                "</form>" +
                                                                "<input id=\"addMemory\" type=\"button\" value=\"Annulla\" onclick=\"displayAllReviews();\"></input>";
        };

        displayAllReviews();
    </script>
</html>
