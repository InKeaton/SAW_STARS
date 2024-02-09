<?php
    session_start();
    include_once dirname(__FILE__) .  '/../../model/Star.php';
    $star = new Star();
?>

<!DOCTYPE html>


<html>
    <body>
    </body>
    <script type="module"> 
        import Star from "./Star.js";
        var list = <?php echo json_encode($star->SelectAll());?>; 
        var star = new Star(list);
    </script>
</html>