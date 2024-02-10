<?php
    include_once  dirname(__FILE__) . '/../../_api/_model/Constellation.php';    
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Lista delle constellazioni </title>
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
            <div class="grid-item"><label>Search:</label><input type="text" id="search"></div>
            <div class="grid-item grid-container" id="contain"></div>
        </div>
    </body>

    <script>
        const consList  = <?php  echo json_encode((new Constellation())->SelectAll()); ?>;
        displayCons(consList);

        document.getElementById("search").value = "";
        document.getElementById("search").addEventListener("keyup", changeSearch);
    
        function changeSearch(e) {
            var changeResult = [];
            var cI = 0;
            for(i=0;i<consList.length;i++)
                if(consList[i].consName.search(document.getElementById("search").value) != -1) 
                    changeResult[cI++] = consList[i];
            displayCons(changeResult);
        }

        function displayCons(list) {
            var outString = "";
            index = 0;
            while(index<list.length && (list[index])) {
                outString += "<div class='grid-item'>" +
                               "<div>" +
                                    "<img src='../_resources/img/starImg.png'>" +
                                "</div>" +
                                "<hr>" +
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
