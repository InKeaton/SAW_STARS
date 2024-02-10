<?php
    session_start();
    include_once dirname(__FILE__) .  '/../../../_api/_model/Sub.php';
    include_once dirname(__FILE__) .  '/../../../_api/_model/User.php';
    include_once dirname(__FILE__) .  '/../../../_api/_model/Star.php';
?>

<!DOCTYPE html>

<html>
    <body>
    </body>
    <script src = "../CRUDTable.js"></script>
    <script src = "./Sub.js"></script>
    <script> 
        new Sub(<?php echo json_encode((new Sub())->SelectAll());?>, <?php echo json_encode((new User())->SelectAll());?>, <?php echo json_encode((new Star())->SelectAll());?>);
    </script>

</html>