<?php
    require "get_db_credentials/get_RW_db_credentials.php";
    if(($_SERVER["REQUEST_METHOD"] == "POST") && (isset($_POST["richiesta"]))) {
        $con = new mysqli($sql_cred[0],$sql_cred[1],$sql_cred[2],$sql_cred[3]);
        MngRichiesta($_POST["richiesta"]);
    }

    function UsrSelect() {
        echo "hello";
    }

    function MngRichiesta($rq) {
        switch ($rq) {
            case "login":
                UsrSelect();
                break;
        }

    }
?>