<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>The Game</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="modernizr.custom.65897"></script>
</head>
<body>
<h2>The Game</h2>
    <?php
    $dir = "TheGamers.txt";
    //$fileHandle = fopen($mainFile, 'ab');



    //success it is a directory
    if(is_dir($dir)){
        if(isset($_POST['submit'])){
            if(empty($_POST['fName'])){
                echo "You did not fill out your first name<br>\n";
            }
            if(empty($_POST['lName'])){
                echo "You did not fill out your last name<br>\n";
            }
            if(empty($_POST['email'])){
                echo "You did not fill out your email<br>\n";
            }
            if(empty($_POST['age'])){
                echo "You did not fill out your age<br>\n";
            }
            if(empty($_POST['sName'])){
                echo "You did not fill out your screen name<br>\n";
            }
            if(empty($_POST['username'])){
                echo "You did not fill out your username<br>\n";
            }
            if(empty($_POST['password'])){
                echo "You did not fill out your password<br>\n";
            }

        }
    }else{
        mkdir($dir);
        chmod($dir, 0757);
    }
    ?>
    <form action="TheGame.php" method="post" enctype="multipart/form-data">
        First Name:<input type="text" name="fName"><br>
        Last Name: <input type="text" name="lName"><br>
        email: <input type="text" name="email"><br>
        age: <input type="text" name="age"><br>
        screen name: <input type="text" name= "sName"><br>
        Username:<input type="text" name="username" value=""><br>
        Password:<input type="text" name="password"> <br>
        <textarea name="comment" cols="100" rows="6"></textarea> <br>
        <input type="submit" name="submit" value="Upload the File"> <br>
    </form>

</body>
</html>