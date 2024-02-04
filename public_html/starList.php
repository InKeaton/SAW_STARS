<!DOCTYPE html>

<html>
    <head>
        <title>starList</title>
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
        <div id="pageDiv">
            <div id="inputDiv">
                <label>Search Star: </label>
                <input id="inputName" name="starName" type="text" value="" placeholder="search star....">
            </div>
            <table id="result">
            
            </table>
        </div>        
    </body>
    <script>
        var starList;
        
        window.onload = getAllStar();
        
        document.getElementById("inputName").addEventListener("change", changeSearch);
        document.getElementById("inputName").value = "";
        
        async function getAllStar() {
            let response = await fetch('/api/getAllStar.php', { method: 'POST' });
            starList = await response.json();
            displayStar(starList);
        }

        function changeSearch() {
            var changeResult=[];
            const search =  document.getElementById("inputName").value;
            var cI = 0;
            for(i=0;i<starList.length;i++)
                if(starList[i].starName.search(search) != -1) 
                    changeResult[cI++] = starList[i];
            displayStar(changeResult);
        }

        function displayStar(list) {
            outString = "<tr>";
            index = 0;
            while(index<list.length && (list[index])) {
                outString += "<td><div><img src='img/starImg.png'></div><hr><p><a href='/public_html/starDetails.php?starID="+list[index].starID +"'>" + list[index++].starName + "</a></p></td>";
                if(index%5 == 0) outString += "</tr><tr>";    
            }
            if(index%5!=0 || index == 0) outString += "</tr>";
            document.getElementById("result").innerHTML = outString;
        }
    </script>

</html>
