<?php
    session_start();
    include_once dirname(__FILE__) .  '/../../../api/_model/Review.php';
    include_once dirname(__FILE__) .  '/../../../api/_model/User.php';
    include_once dirname(__FILE__) .  '/../../../api/_model/Star.php';
?>

<!DOCTYPE html>

<html>
    <body>
    </body>
    <script src = "../CRUDTable.js"></script>
    <script src = "./Review.js"></script>
    <script> 
        new Review(<?php echo json_encode((new Review())->SelectAll());?>, <?php echo json_encode((new User())->SelectAll());?>, <?php echo json_encode((new Star())->SelectAll());?>);
    </script>

</html>