<?php
    include_once dirname(__FILE__) .  '/../../_api/_model/Star.php';
    include_once dirname(__FILE__) .  '/../../_api/_model/Constellation.php';
?>

<!DOCTYPE html>


<html>
    <body>
    </body>
    <script src = "../CRUDTable.js"></script>
    <script src = "./Star.js"></script>
    <script> 
        new Star( <?php echo json_encode((new Star())->SelectAll());?>, <?php echo json_encode((new Constellation)->SelectAll()); ?>);
    </script>

</html>