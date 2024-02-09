<?php
    session_start();
    include_once dirname(__FILE__) .  '/../../model/User.php';
    $usr = new User();
?>

<!DOCTYPE html>

<html>
    <head>
        <title> User Admin </title>
        <style>

            #tableDiv {
                position: absolute;
                width: 100%;
                height: 90%;
                top: 10%;
            }
            #tableDiv > #user {
                overflow: scroll;
                width: 100%;
                height: 90%;
                border: 1px;
                border-color: black;
                border-style: solid;
            }
            #user > table {
                width: 100%;
            }
            td {
                border: 2px;
                height: 10%;
                border-color: black;
                border-style: solid;
            }
        </style>
    </head>
    <body>
        <?php include_once  dirname(__FILE__) .  '/../modules/navbar.php';?>
        <div id="tableDiv">
            <h1>User Table </h1>
            <div id="user">
                <table id = "userTable">

                </table>
            </div>
        </div>
    </body>
    <script>
        
        const userList = <?php echo json_encode($usr->SelectAll());?>;
        displayUser(userList);

        function displayUser(list) {
            outString = "";
            id = 0;
            list.forEach((element) => {
                outString += genRow(element, id);
                id++;
            }); 
            document.getElementById("userTable").innerHTML = outString;
        }

        function genRow(element, id) {
            return  "<tr id=riga"+id+"><p><td>"+ 
                    "Firstname: " + element.firstName + " Lastname: "  + element.lastName + 
                    "</td><td><a href='userDetails.php?userID="+element.userID+"'>Details</a></td>"+ 
                    "<td><form action='javascript:updateRole("+id+")' id = update"+id+">" +
                    "<label>Role: <input type='checkbox' name = 'role' value='1' " + ((element.role == 1)? "checked" : "") + ">" + 
                    "<input type = 'hidden' name='userID' value= "+element.userID+" >" + 
                    "<input type = 'submit' value = 'update'>" +
                    "</form></td><td>"+
                    "<form  action='javascript:deleteUser("+id+")' id = delete"+id+">" + 
                    "<input type = 'hidden' name='userID' value= "+element.userID+" >" + 
                    "<input type = 'submit' value = 'delete'>" +
                    "</form></td></p></tr>";
        }

        async function updateRole(userID) {
            const form = document.getElementById("update"+userID);
            let response = await fetch('../api/updateRole.php', { method: 'POST', body : new FormData(form) });
            result = await response.json();
            if(result.status == 200) alert("Update avvenuto con successo");
        }

        async function deleteUser(id) {
            const form = document.getElementById("delete"+id);
            let response = await fetch('../api/deleteUser.php', { method: 'POST', body : new FormData(form) });
            result = await response.json();
            if(result.status == 200) alert("Update avvenuto con successo");
            document.getElementById("riga"+id).remove();
        }


    </script>
</html>