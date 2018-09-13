<!DOCTYPE html>
<html lang = "en">
<head>
    <title>ERROR: Login to File Sharing</title>
</head>
<body>
    <?php
    $st = "Error: There already this exists a username";
    echo htmlentities($st);
    ?>
    <br>
    <form action="login.php"> <!--Back to the login page-->
        <input type="submit" class = button value="< Retry">
    </form>

</body>
</html>