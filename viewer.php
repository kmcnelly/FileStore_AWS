<!DOCTYPE html>
<html lang = "en">
<head>
    <title>File Sharing Viewer</title>
</head>
<body>
    <?php
    session_start();
    
    $file = trim($_GET['file']);
    // Get the filename and make sure it is valid
    if( !preg_match('/^[\w_\.\-]+$/', $file) ){
    	echo "Invalid filename";
    	exit;
    }

    // Get the username and make sure it is valid
    $username = $_SESSION['username'];
    if( !preg_match('/^[\w_\-]+$/', $username) ){
        echo "Invalid username";
        exit;
    }

    $full_path = sprintf("/srv/uploads/%s/%s", $username, $file);

    // get the MIME type
    $finfo = new finfo(FILEINFO_MIME_TYPE);
    $mime = $finfo->file($full_path);
    
    ob_clean();

    // set the Content-Type header to the MIME type of the file, and display the file.
    header("Content-Type: ".$mime);
    readfile($full_path);
    ?>
</body>
</html>
