<!DOCTYPE html>
<html lang = "en">
<head>
    <title>File Sharing</title>
</head>
<body>
<?php
session_start();

// Get the filename and make sure it is valid
$filename = basename($_FILES['uploadedfile']['name']);
if( !preg_match('/^[\w_\.\-]+$/', $filename) ){
	echo "Invalid filename";
	exit;
}

// Get the username and make sure it is valid
$username = $_SESSION['username'];
if( !preg_match('/^[\w_\-]+$/', $username) ){
	echo "Invalid username";
	exit;
}

$full_path = sprintf("/srv/uploads/%s/%s", $username, $filename);

if( move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $full_path) ){
    header("Location: Files.php");
	exit;
}else{
	echo "Upload Failed";
	exit;
}

?>
</body>
</html>