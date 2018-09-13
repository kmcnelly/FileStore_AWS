<!DOCTYPE html>
<html lang = "en">
<head>
    <title>ERROR: Login to File Sharing</title>
</head>
<body>
    <?php
    $st = "Error: Incorrect or no username entered.";
    echo htmlentities($st);
    ?>
    <br>
    <form action="login.php">
        <input type="submit" class = button value="< Retry">
    </form>
</body>
</html>