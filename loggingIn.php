<!DOCTYPE html>
<html lang = "en">
<head>
    <title>File Sharing</title>
</head>
<body>
    <?php
    $usernameList = fopen("/home/lifeiswhy/users.txt", "r");
    $valid = false; #if valid is false at the end of the file, then an incorrect or no username was entered
    if (empty($_GET['user'])) {
        $valid = false;
    }
    else {
        $username = (String) $_GET['user'];
        while(!feof($usernameList)) {
            if (trim((String)fgets($usernameList)) == $username){
                $valid = true;
            }
        }
    }
    fclose($usernameList);
    
    if ($valid == false) {
        header("location: wrongLogin.php");
        exit;
    }
    else if ($valid == true){
        session_start();
        $_SESSION['username'] = $username; #stores the username until the user logs out
        header("location: Files.php");
        exit;
    }
    ?>
</body>
</html>