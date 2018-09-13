<!DOCTYPE html>
<html lang = "en">
<head>
    <title>File Sharing</title>
</head>
<body>
    
    <?php
    session_start();
    $username = $_SESSION['username'];
    if (empty($username)) {
        header("location: wrongLogin.php");
        exit;
    }
    $dir = "/srv/uploads/$username";
    $afiles = opendir($dir);
    $emailKnown = false;
    echo "Hello $username <br>";
    echo "<br>";
    echo "Files: <br>";
    #while not copied exactly, the following code came from the PHP online manual, specifically example #2 on page: http://php.net/manual/en/function.readdir.php
    if ($afiles) {
        while ( false !== ($file = readdir($afiles)) ) {
            if ($file != "." && $file != ".." && $file != "zxcv.txt"){  #zxcv.txt is an addition I made, as the text file that would hold the email
                echo "$file <br>";                                      #of the currently logged in user. It is stored in the user directory, but we don't want it
            }                                                           #accessible by the user
            if($file == "zxcv.txt") { #If the email text file is within the user directory, then the user has provided us with their email
                $emailKnown = true;
            }
        }
    }
    closedir($afiles);
    #end of cited code
    echo "<br>";
    ?>   
    
    <form  action="viewer.php" method="GET">
	<label>Copy and paste the name of the file you wish to view, including extention:</label> <input type="text" name="file"> 
	<input type="submit" value="View" />
    </form>
    
    <form enctype="multipart/form-data" action="uploader.php" method="POST">
	<p>
		<input type="hidden" name="MAX_FILE_SIZE" value="20000000" />
		<label for="uploadfile_input">Choose a file to upload (Max size 2MB):</label> <input name="uploadedfile" type="file" id="uploadfile_input" />
	</p>
	<p>
		<input type="submit" value="Upload File" />
	</p>
    </form>
    
    <form  action="delete.php" method="GET">
	<label>Copy and paste the name of the file you wish to delete, including extention:</label> <input type="text" name="file"> 
	<input type="submit" value="Delete" />
    </form>
    <br>
    
    <?php #If the user has not provided their email adderss, a form and a message appear to them asking if they would want to.
    if (!$emailKnown) {
        echo "<form  action=\"giveEmail.php\" method=\"GET\">
        <label>Enter your email to recieve updates about your account, such as when a file is deleted:</label> <input type=\"text\" name=\"email\"> 
        <input type=\"submit\" value=\"Enter\" />
        </form>";
        echo "When you sign up for email notice, check your inbox for a confirmation email, including spam!";
    }
    ?>
    
     
    <br><br>
    <form action ="logout.php" method = "GET">
    <input type="submit" value = "Logout"> 
</body>
</html>