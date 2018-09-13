<!DOCTYPE html>
<html lang = "en">
<head>
    <title>File Sharing Viewer</title>
</head>
<body>
    <?php
    session_start();
    
    $file = (String )trim($_GET['file']);
    if( !preg_match('/^[\w_\.\-]+$/', $file) ){ #These regular expressions ensure only proper file and usernames are selected
    	echo "Invalid filename";
    	exit;
    }

    $username = $_SESSION['username'];
    if( !preg_match('/^[\w_\-]+$/', $username) ){
        echo "Invalid username";
        exit;
    }

    $edir = fopen("/srv/uploads/$username/zxcv.txt", "r");
    $mail = fgets($edir);
    fclose($edir); #This sends an email, if one has been provided, notifying the user that a file has been deleted
    mail($mail, "Deletion", "If you have recieved this message, then $file has been deleted.");
    $full_path = sprintf("/srv/uploads/%s/%s", $username, $file);

    if( unlink($full_path) ){
    header("Location: Files.php");
	exit;
    }else{
	header("Location: faild.php");
    exit;
	exit;
    }

?>
</body>
</html>