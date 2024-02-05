<?php
    session_start();
    include_once dirname(__FILE__) .  '/../../model/Star.php';
    $star = new Star();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Star</title>
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
            <h1>Star Table </h1>
            <div id="user">
                <table id = "starTable">
                    
                </table>
            </div>
        </div>
    </body>
    <script>
        var starList = <?php echo json_encode($star->SelectAll());?>
        
    </script>
</html>