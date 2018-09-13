<!DOCTYPE html>
<html lang = "en">
<head>
    <title>Logout: File Sharing</title>
</head>
<body>
    <?php
    session_start();
    session_destroy(); #removes all session variables
    echo "You have successfully logged out"
    ?>
    <br>
    <form action="login.php">
        <input type="submit" class = button value="< Retry">
    </form>
</body>
</html>
