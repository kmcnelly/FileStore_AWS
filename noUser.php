<!DOCTYPE html>
<html lang = "en">
<head>
    <title>ERROR: No User</title>
</head>
<body>
    <?php
    $st = "Error: There is no user by that name";
    echo htmlentities($st);
    ?>
    <br>
    <form action="deleteUser.php">
        <input type="submit" class = button value="< Retry">
    </form>

</body>
</html>