<!DOCTYPE html>
<html lang = "en">
<head>
    <title>File Sharing</title>
</head>
<body>
    <?php
    session_start();
    # this page takes the provided email, confirms it works, and then stores it in the user directory
    (String) $email = $_GET['email'];
    
    if ( mail($email, "Confirmation Email", "If you have recieved this message, then your email has connected to the simple file sharing service") ){
        $username = $_SESSION['username'];
        $edir = fopen("/srv/uploads/$username/zxcv.txt", "x");
        chmod("/srv/uploads/$username/zxcv.txt", 0777);
        fwrite($edir, $email);
        fclose($edir);
        header("Location: Files.php");
        exit;
    }
    else {
        echo "Email confirmation failed.";
    }
    ?>
</body>
</html>