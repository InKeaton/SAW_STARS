<?php
    include_once  dirname(__FILE__) . '/../../api/_utils/sessionControl.php';  
    include_once  dirname(__FILE__) . '/../../api/_model/Constellation.php';     
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Lista delle constellazioni </title>
        <style>
            body {background-color: rgb(84, 84, 250);}
            #pageDiv {
                position: absolute;
                width: 80%;
                height:80%;
                top: 10%;
                left: 10%;
                border: 2px;
                border-radius: 2%;
                border-color: black;
                border-style: solid;
                background-color: whitesmoke;
            }

            #pageDiv > #inputDiv {
                position:inherit;
                width: 80%;
                height: 20%;
                left: 10%;
            }
            #inputDiv > input { width: 80%; }
            #inputDiv > label, button { width: 10%; }
           
            #pageDiv > table {
                position: inherit;
                top: 10%;
                width: 100%;
            }

            img {
                width: 50px;
                height: 50px;
            }
            
            td {
                width: 20%;
                height: 20%;             
                border: 0.5px;
                border-color: black;
                border-style: solid;
            }
            
            td > div { 
                height: 80%; 
                text-align: center;
            }

            td > p { 
                text-size-adjust: 10px; 
                text-align: center;
            }

        </style>
    </head>
    <body>
        <div id = "pageDiv"> 
            <div id="inputDiv">
                <label>Search Star: </label>
                <input id="inputName" name="starName" type="text" value="" placeholder="search star...."> <br>
            </div>
            <table id="constList">
            </table>
        </div>
    </body>
    <script>
        const consList  = <?php  echo json_encode((new Constellation())->SelectAll()); ?>;
        displayCons(consList);

        document.getElementById("inputName").value = "";
        document.getElementById("inputName").addEventListener("keyup", changeSearch);
    
        function changeSearch(e) {
            var changeResult = [];
            var cI = 0;
            for(i=0;i<consList.length;i++)
                if(consList[i].consName.search(document.getElementById("inputName").value) != -1) 
                    changeResult[cI++] = consList[i];
            displayCons(changeResult);
        }

        function displayCons(list) {
            outString = "<tr>";
            index = 0;
            while(index<list.length && (list[index])) {
                outString += "<td>" +
                               "<div>" +
                                    "<img src='../_resources/img/starImg.png'>" +
                                "</div>" +
                                "<hr>" +
                                "<p>" +
                                    "<a href='consDetails.php?consID="+list[index].consID +"'>" + 
                                        list[index++].consName + 
                                    "</a>" +
                                "</p>" +
                            "</td>";
                if(index%5 == 0) outString += "</tr><tr>";    
            }
            if(index%5!=0 || index == 0) outString += "</tr>";
            document.getElementById("constList").innerHTML = outString;
        }
        

    </script>
</html>