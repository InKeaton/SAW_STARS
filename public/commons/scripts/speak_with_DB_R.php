<?php

    function retrieve_data($stmt) {
        $usr_data = [];
        if(!$stmt->execute())
            throw new Exception("<h1 class=\"error\">Unexpected Error: Could not get data</h1>");
        if(!($res = $stmt->get_result()) && !$stmt->errno)
            throw new Exception("<h1 class=\"error\"> Unexpected Error: Could not get query results</h1>");
        
        $index = $res->num_rows;     
        while ($index > 0) {
            array_push($usr_data, $res->fetch_object());
            $index--;        
        }
        $stmt->close();

        return $usr_data;
    }

    function create_connection() {
        require "get_db_credentials/get_R_db_credentials.php";
        $con = new mysqli($sql_cred[0],$sql_cred[1],$sql_cred[2],$sql_cred[3]);
        if($con->connect_errno) throw new Exception("Errore nella connessione con il DB");
        return $con;
    }

?>

<?php
    function sel_usr($rq) {
        if(isset($rq["email"])) {
            try {
                $con = create_connection();
                if(!($stmt = $con->prepare("SELECT * FROM Utente WHERE email = ?;"))) 
                    throw new Exception("Errore nella preparazione della query");
                if(!($stmt->bind_param('s', $rq["email"]))) 
                    throw new Exception("Errore nel binding dei parametri");
                return retrieve_data($stmt);
            } catch(Exception $e) {
                return  "<h1>". $e->getMessage() . "</h1>";
            }
        }
    }

    function sel_sub() {
        if(isset($_SESSION["email"])) {
            try {
                $con = create_connection();
                if(!($stmt = $con->prepare("SELECT * FROM Utente AS U INNER JOIN Abbonamento AS A ON U.idUtente = A.fkUtente WHERE U.email = ?;")))
                    throw new Exception("Errore nella preparazione della query");
                if(!($stmt->bind_param('s', $_SESSION["email"])))
                    throw new Exception("Errore nel binding dei parametri");
                return retrieve_data($stmt);
            } catch(Exception $e) {
                return  "<h1>". $e->getMessage() . "</h1>";
            }
        }
        
    }

    //select delle varie stelle presenti all'interno dell'abbonamento
    function sel_sub_star($rq) {
        if(isset($rq["idAbbonamento"]) && isset($_SESSION["email"])) {
            try {
                $con = create_connection();
                if(!($stmt = $con->prepare("SELECT * FROM AbbonamentoStella AS A  INNER JOIN Stella AS S ON A.fkStella = S.idStella WHERE A.idAbbonamentoStella = ?;")))
                    throw new Exception("Errore nella preparazione della query");
                if(!($stmt->bind_param('s', $rq["idAbbonamento"])))
                    throw new Exception("Errore nel binding dei parametri");
                return retrieve_data($stmt);
            } catch(Exception $e) {
                return  "<h1>". $e->getMessage() . "</h1>";
            }
        }
    }

    //select delle varie recensioni fatte per stella
    function sel_star_rvw($rq) {
        if(isset($rq["idStella"]) && isset($_SESSION["email"])) {
            try {
                $con = create_connection();
                if(!($stmt = $con->prepare("SELECT * FROM Recensione AS R INNER JOIN Stella AS S ON R.fkStella = S.idStella WHERE S.idStella = ?;")))
                    throw new Exception("Errore nella preparazione della query");
                if(!($stmt->bind_param('s', $rq["idStella"])))
                    throw new Exception("Errore nel binding dei parametri");
                return retrieve_data($stmt);
            } catch(Exception $e) {
                return  "<h1>". $e->getMessage() . "</h1>";
            }
        }
    }

    //select delle varie recensioni
    function sel_usr_rvw() {
        if(isset($_SESSION["email"])) {
            try {
                $con = create_connection();
                if(!($stmt = $con->prepare("SELECT * FROM  Utente AS U INNER JOIN Recensione AS R ON U.idUtente = R.fkUtente WHERE U.email = ?;")))
                    throw new Exception("Errore nella preparazione della query");
                if(!($stmt->bind_param('s', $_SESSION["email"])))
                    throw new Exception("Errore nel binding dei parametri");
                return retrieve_data($stmt);
            } catch(Exception $e) {
                return  "<h1>". $e->getMessage() . "</h1>";
            }
        }
    }

    function get_msg() {
        $jsonData = file_get_contents('php://input');
        $data = json_decode($jsonData, true);
        switch ($data["richiesta"]) {
            case "sel_usr":
                return sel_usr($data);
                break;
            case "sel_sub":
                return sel_sub();
                break;
            case "sel_sub_star":
                return sel_sub_star($data);
                break;
            case "sel_star_rvw":
                return sel_star_rvw($data);
                break;
            case "sel_usr_rvw":
                return sel_star_rvw();
                break;
            default:
                echo "<h1> La richiesta inviata non esiste </h1>";
        }   
    }
?>
<?php
    if($_SERVER["REQUEST_METHOD"] == "POST" ) {
        echo json_encode(get_msg());
    }
     
?>
