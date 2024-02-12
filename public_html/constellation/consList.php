<!DOCTYPE html>
<?php
    include_once  dirname(__FILE__) . '/../_api/_model/Constellation.php';  
    session_start();  
?>
<!------------------------------------------------------------------------------------------------------------>
<html lang="it">
    <head>
        <title>Lista delle Costellazioni </title>
        <!-- CSS stylesheet -->
        <link rel="stylesheet" media="screen and (orientation: landscape)" href="../_resources/style/landscape/search.css">
        <link rel="stylesheet" media="screen and (orientation: portrait)"  href="../_resources/style/portrait/search.css">
    </head>

    <body>
        <!-- navbar -->
        <?php include  dirname(__FILE__) . "/../_modules/navbar.php"; ?>

        <header class = "logo">
            <h1 id="search">Cerca una Costellazione!</h1>
            <h2>Scorri nel nostro database</h2>
        </header>

        <input class="searchbar" type="text" aria-labelledby="search" id="searchbar" placeholder="Cerca..."></input>
        
        <section class="grid-container" id="contain"> 
        </section>
    </body>
<!------------------------------------------------------------------------------------------------------------>
    <script>
        const consList  = <?php  echo json_encode((new Constellation())->SelectAll()); ?>;
        displayConstellation(consList);

        document.getElementById("searchbar").value = "";
        document.getElementById("searchbar").addEventListener("keyup", changeSearch);
    
        function changeSearch(e) {
            var changeResult = [];
            var cI = 0;
            for(i=0; i<consList.length; i++)
                if(consList[i].consName.toLowerCase().search(document.getElementById("searchbar").value) != -1)
                    changeResult[cI++] = consList[i];
            if(cI){
                displayConstellation(changeResult);
                return;
            }
            document.getElementById("contain").innerHTML = "<div class='grid5'>" +
                                                                "<h2>Uh, questo è imbarazzante...</h2>" +
                                                                "<p>Prova a cercare con altre parole</p>" +
                                                           "</div>";
        }

        function displayConstellation(list) {
            var outString = "";
            index = 0;
            while(index<list.length && (list[index])) {
                outString += "<div class='grid1'>" +
                               "<div>" +
                                    "<img src='../_resources/img/icons8-constellation-100.png'>" +
                                "</div>" +
                                "<p>" +
                                    "<a href='consDetails.php?consID="+list[index].consID +"'>" + 
                                        list[index++].consName + 
                                    "</a>" +
                                "</p>" +
                            "</div>";
            }
            document.getElementById("contain").innerHTML = outString;
        }
        
    </script>
</html>
