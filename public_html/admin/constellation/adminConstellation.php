<?php
    include_once dirname(__FILE__) .  '/../../_api/_utils/sessionAdControl.php';
    include_once dirname(__FILE__) .  '/../../_api/_model/Constellation.php';
?>

<!DOCTYPE html>


<html lang="it">
    <body>
        <!-- navbar -->
        <?php include  dirname(__FILE__) . "/../../_modules/adNavbar.php"; ?>
        <?php include  dirname(__FILE__) . "/../../_modules/footer.html"; ?>
    </body>
    <script src = "../CRUDTable.js"></script>
    <script src = "./Constellation.js"></script>
    <script> 
        new Constellation( <?php echo json_encode((new Constellation())->SelectAll());?>);
    </script>

</html>