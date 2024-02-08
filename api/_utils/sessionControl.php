<?php  
    /* 
    *   Serve semplicemente per controllare che la sessione sia stat creata
    *   Se non dovesse essere così allora l'utente verrà rispedito nella pagina login.html
    */
    session_start();
    if(!isset($_SESSION['uuid']))
        header("Location: /public_html/auth/login.php");
?>