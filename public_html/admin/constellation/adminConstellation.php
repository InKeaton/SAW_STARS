<?php
    session_start();
    include_once dirname(__FILE__) .  '/../../../api/_model/Constellation.php';
?>

<!DOCTYPE html>


<html>
    <body>
    </body>
    <script src = "../CRUDTable.js"></script>
    <script src = "./Constellation.js"></script>
    <script> 
        new Constellation( <?php echo json_encode((new Constellation())->SelectAll());?>);
    </script>

</html>