<?php
    include_once dirname(__FILE__) .  '/../../_api/_utils/sessionAdControl.php';
    include_once dirname(__FILE__) .  '/../../_api/_model/Review.php';
    include_once dirname(__FILE__) .  '/../../_api/_model/User.php';
    include_once dirname(__FILE__) .  '/../../_api/_model/Star.php';
?>

<!DOCTYPE html>

<html>
    <body>
        <!-- navbar -->
        <?php include  dirname(__FILE__) . "/../../_modules/adNavbar.php"; ?>
    </body>
    <script src = "../CRUDTable.js"></script>
    <script src = "./Review.js"></script>
    <script> 
        new Review(<?php echo json_encode((new Review())->SelectAll());?>, <?php echo json_encode((new User())->SelectAll());?>, <?php echo json_encode((new Star())->SelectAll());?>);
    </script>

</html>