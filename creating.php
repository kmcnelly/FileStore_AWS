<!DOCTYPE html>
<html lang = "en">
<head>
    <title>Creating</title>
</head>
<body>

    <?php

    $valid = true; #If this is false, then the user didn't enter anything into the new username and will be directed to an error page

    $usernameList = fopen("/home/lifeiswhy/users.txt", "r") or die("Unable to open file!");

    if (empty($_GET['user'])) {
        $valid = false;
    }
    else {
        $username = (String) $_GET['user'];
        while(!feof($usernameList)) { #This while loop ensures that a new user does not take the name of an existing user
            if (trim((String)fgets($usernameList)) == $username){
                header("location: existUser.php");
                exit;
            }
        }
        file_put_contents('/home/lifeiswhy/users.txt', "
" , FILE_APPEND | LOCK_EX); #Though ugly, this line break allows for new users on the user.txt file to appear in new lines
        file_put_contents('/home/lifeiswhy/users.txt', $username.PHP_EOL , FILE_APPEND | LOCK_EX);

        mkdir("/srv/uploads/$username",0777,true);
    }
   

    if ($valid == false) {
        header("location: wrongLogin.php");
        exit;
    }
    else{
        header("location: login.php");
        exit;
    }

    ?>

</body>
</html>