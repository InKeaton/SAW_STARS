<!DOCTYPE html>
<?php
    include_once  dirname(__FILE__) . '/../_api/_model/Star.php';  
    session_start();  
?>
<!------------------------------------------------------------------------------------------------------------>
<html lang="it">
    <head>
        <title>Lista delle Stelle </title>
        <!-- CSS stylesheet -->
        <link rel="stylesheet" media="screen and (orientation: landscape)" href="../_resources/style/landscape/search.css">
        <link rel="stylesheet" media="screen and (orientation: portrait)"  href="../_resources/style/portrait/search.css">
    </head>

    <body>
        <!-- navbar -->
        <?php include  dirname(__FILE__) . "/../_modules/navbar.php"; ?>

        <header class = "logo">
            <h1 id="search">Cerca una stella!</h1>
            <h2>Scorri nel nostro database</h2>
        </header>

        <input class="searchbar" aria-labelledby="search" type="text" id="searchbar" placeholder="Cerca..."></input>
        
        <section class="grid-container" id="contain"> 
        </section>
    </body>
<!------------------------------------------------------------------------------------------------------------>
    <script>
        const starList  = <?php  echo json_encode((new Star())->SelectAll()); ?>;
        displayStar(starList);

        document.getElementById("searchbar").value = "";
        document.getElementById("searchbar").addEventListener("keyup", changeSearch);
    
        function changeSearch(e) {
            var changeResult = [];
            var cI = 0;
            for(i=0; i<starList.length; i++)
                if(starList[i].starName.toLowerCase().search(document.getElementById("searchbar").value) != -1)
                    changeResult[cI++] = starList[i];
            if(cI){
                displayStar(changeResult);
                return;
            }
            document.getElementById("contain").innerHTML = "<div class='grid5'>" +
                                                                "<h2>Uh, questo è imbarazzante...</h2>" +
                                                                "<p>Prova a cercare con altre parole</p>" +
                                                           "</div>";
        }

        function displayStar(list) {
            var outString = "";
            index = 0;
            while(index<list.length && (list[index])) {
                outString += "<div class='grid1'>" +
                               "<div>" +
                                    "<img src='../_resources/img/icons8-star-100.png' alt=\"Un icona minimale rappresentante una stella\">" +
                                "</div>" +
                                "<p>" +
                                    "<button  onclick=\"location.href=\'starDetails.php?starID="+list[index].starID +"\'\";> " +list[index++].starName + 
                                    "</button>" +
                                "</p>" +
                            "</div>";
            }
            document.getElementById("contain").innerHTML = outString;
        }
        
    </script>
</html>
