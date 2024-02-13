<?php
    include_once dirname(__FILE__) .  '/../../_api/_utils/sessionAdControl.php';
    include_once dirname(__FILE__) .  '/../../_api/_model/Star.php';
    include_once dirname(__FILE__) .  '/../../_api/_model/Constellation.php';
?>

<!DOCTYPE html>


<html>
    <body>
        <!-- navbar -->
        <?php include  dirname(__FILE__) . "/../../_modules/adNavbar.php"; ?>
        <?php include  dirname(__FILE__) . "/../../_modules/footer.html"; ?>
    </body>
    <script src = "../CRUDTable.js"></script>
    <script src = "./Star.js"></script>
    <script> 
        new Star( <?php echo json_encode((new Star())->SelectAll());?>, <?php echo json_encode((new Constellation)->SelectAll()); ?>);
    </script>

</html>