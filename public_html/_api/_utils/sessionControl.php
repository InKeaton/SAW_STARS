<?php  
    /* 
    *   Serve semplicemente per controllare che la sessione sia stat creata
    *   Se non dovesse essere così allora l'utente verrà rispedito nella pagina login.html
    */
    session_start();
    if(!isset($_SESSION['uuid']))
    // TO BE CHANGED FOR THE SERVER
        header("Location: /~S4965918/public_html/auth/login.php");
?>
