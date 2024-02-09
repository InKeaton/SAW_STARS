<?php
    session_start();
    include_once dirname(__FILE__) .  '/../../../api/_model/User.php';
?>

<!DOCTYPE html>


<html>
    <body>
    </body>
    <script src = "../CRUDTable.js"></script>
    <script src = "./User.js"></script>
    <script> 
        new User(<?php echo json_encode((new User())->SelectAll());?>);
    </script>

</html>