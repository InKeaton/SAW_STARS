<?php
    include_once  dirname(__FILE__) . '/../_api/_model/Star.php';  
    session_start();  
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Lista delle Stelle </title>
        <style>
            .grid-container {
                grid-template-columns: auto auto auto;
                display: grid;
                overflow: scroll; 
            }
            .grid-up-contain {
                grid-template-rows: auto auto;
                position: absolute;
                display: grid;
                width: 90%;
                height: 90%;
                top: 5%;
                left: 5%;
                padding: 10px;
            }
            .grid-item {
                background-color: rgba(255, 255, 255, 0.8);
                border: 1px;
                padding: 20px;
                font-size: 30px;
                text-align: center;
            }
            img  {
                width: 25%;
                height: 25%;
            }
        </style>
    </head>
    <body>
        <!-- navbar -->
        <?php include  dirname(__FILE__) . "/../_modules/navbar.php"; ?>
        
        <div class = "grid-up-contain"> 
            <div class="grid-item">
                <label>
                    Search:<br>
                    <input type="text" id="search"></input>
                </label>
            </div>
            <div class="grid-item grid-container" id="contain"></div>
        </div>
    </body>

    <script>
        const starList  = <?php  echo json_encode((new Star())->SelectAll()); ?>;
        displayStar(starList);

        document.getElementById("search").value = "";
        document.getElementById("search").addEventListener("keyup", changeSearch);
    
        function changeSearch(e) {
            var changeResult = [];
            var cI = 0;
            for(i=0;i<starList.length;i++)
                if(starList[i].StarName.search(document.getElementById("search").value) != -1) 
                    changeResult[cI++] = starList[i];
            displayStar(changeResult);
        }

        function displayStar(list) {
            var outString = "";
            index = 0;
            while(index<list.length && (list[index])) {
                outString += "<div class='grid-item'>" +
                               "<div>" +
                                    "<img src='../_resources/img/starImg.png'>" +
                                "</div>" +
                                "<hr>" +
                                "<p>" +
                                    "<a href='StarDetails.php?starID="+list[index].starID +"'>" + 
                                        list[index++].starName + 
                                    "</a>" +
                                "</p>" +
                            "</div>";
            }
            document.getElementById("contain").innerHTML = outString;
        }
        
    </script>
</html>
