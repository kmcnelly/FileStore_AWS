<!DOCTYPE html>
<html lang = "en">
<head>
    <title>File Sharing Viewer</title>
</head>
<body>
    <?php

    $valid = true;

    $usernameList = fopen("users.txt", "r") or die("Unable to open file!");

    if (empty($_GET['user'])) {
        $valid = false;
    }
    else {
        $username = $_GET['user'];

        while(!feof($usernameList)) {
            if (trim((String)fgets($usernameList)) == $username){
            
                $allUsers = file_get_contents('users.txt', true);

                $blank = ""

                $allUsers = str_replace($username, $blank , $allUsers);              


                rmdir ("/srv/uploads/$username") or die("directory probably still has files");

                


                
            }
        }

        
    }
   

    if ($valid == false) {
        header("location: noUser.php");
        exit;
    }
    else{
        session_start();
        header("location: login.html");
        exit;
    }

    ?>
</body>
