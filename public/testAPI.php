<!DOCTYPE html>

<html>
    <form method = "POST" action="commons/scripts/speak_with_DB_R.php">
        <input type="text" name="email">
        <input type="text" name="richiesta" value="login">
        <input type="submit">
    </form>
    <?php 
        require "commons/scripts/speak_with_DB_R.php";
    ?>

</html>