<?php
    require "get_db_credentials/get_R_db_credentials.php";
 
    if(($_SERVER["REQUEST_METHOD"] == "POST") && (isset($_POST["richiesta"]))) {
        MngRichiesta($_POST["richiesta"]);
    }

    function UsrSelect() {
        $con = new mysqli($sql_cred[0],$sql_cred[1],$sql_cred[2],$sql_cred[3]);
        $con->prepare("SELECT pwd, nome FROM Utente WHERE email = ?;");
        $stmt->bind_param('s',$_POST["email"]);
        $stmt->execute();
        $res = $stmt->get_result();
        echo "fondo";
    }

    function MngRichiesta($rq) {
        switch ($rq) {
            case "login":
                UsrSelect();
                break;
        }

    }
?>