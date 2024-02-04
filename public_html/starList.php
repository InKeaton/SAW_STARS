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

            #pageDiv > form {
                position:inherit;
                width: 80%;
                height: 20%;
                left: 10%;
            }
            form > input { width: 80%; }
            form > label, button { width: 10%; }
           
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
            <form id="pageForm" action="javascript:script()">
                <label>Search Star: </label>
                <input id="inputName" name="starName" type="text" placeholder="search star....">
                <button>search ... </button>
            </form>
            <table id="result">
            
            </table>
        </div>        
    </body>
    <script>
        window.onload = getAllStar();
        
        function getAllStar() {
            fetch('/api/getAllStar.php', { method: 'POST' })
            .then(response => response.json()).then(result => { displayStar(result); })
        }

        function displayStar(starList) {
            outString = "<tr>";
            index = 0;
            do {
                outString += "<td><div><img src='img/starImg.png'></div><hr><p><a href='/public_html/starDetails.php?starID="+starList[index].starID +"'>" + starList[index].starName + "</a></p></td>";
                index++;
                if(index%5 == 0) outString += "</tr><tr>";    
            }while(index<starList.length);
            if(index%5!=0 || index == 0) outString += "</tr>";
            document.getElementById("result").innerHTML = outString;
        }

    </script>

</html>
