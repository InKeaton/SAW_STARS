<?php  
    /* 
    *   Serve semplicemente per controllare che la sessione sia stata creata
    *   Se non dovesse essere così allora l'utente verrà rispedito nella pagina login.html
    */
    session_start();
    if(!isset($_SESSION['uuid']) or $_SESSION['role']!==1)
    // TO BE CHANGED FOR THE SERVER
        header("Location: /~S4965918/public_html/auth/login.php");
?>