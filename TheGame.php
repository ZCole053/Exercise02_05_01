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
    //holding input valus
    // $firstName = $_POST['fName'];
    // $lastName = $_POST['lName'];
    // $email = $_POST['email'];
    // $age = $_POST['age'];
    // $screenName = $_POST['sName'];
    // $uName = $_POST['username'];
    // $pName = $_POST['password'];


    $file = "TheGamers.txt";
    



    //success it is a directory
        if(isset($_POST['submit'])){
            //checking to see if fields are empty
            if(empty($_POST['fName'])){
                echo "You did not fill out your first name<br>\n";
            }
            elseif(empty($_POST['lName'])){
                echo "You did not fill out your last name<br>\n";
            }
            elseif(empty($_POST['email'])){
                echo "You did not fill out your email<br>\n";
            }
            elseif(empty($_POST['age'])){
                echo "You did not fill out your age<br>\n";
            }
            elseif(empty($_POST['sName'])){
                echo "You did not fill out your screen name<br>\n";
            }
            elseif(empty($_POST['username'])){
                echo "You did not fill out your username<br>\n";
            }
            elseif(empty($_POST['password'])){
                echo "You did not fill out your password<br>\n";
            }else{
                $gottenData = stripslashes($_POST['fName']). "\n";
                $gottenData .= stripslashes($_POST['lName']). "\n";
                $gottenData .= stripslashes($_POST['email']). "\n";
                $gottenData .= stripslashes($_POST['age']). "\n";
                $gottenData .= stripslashes($_POST['sName']). "\n";
                $gottenData .= stripslashes($_POST['username']). "\n";
                $gottenData .= stripslashes($_POST['password']). "\n";
                echo "\$gottenData : $gottenData";//debugg

                //oens and appends the file
                $fileHandle = fopen($file, 'ab');
                //success
                if($fileHandle == true){
                    //locks the file so only one can get into it a one time
                    if(flock($fileHandle,LOCK_EX)){
                        if(fwrite($fileHandle, $gottenData) > 0 ){
                            echo "Successfully wrote to TheGamers.txt file.<br>\n";
                        }else{
                            echo "There was an error writting to TheGamers.txt file .<br>\n";
                        }
                        //locks the file so another user can use it
                        flock($fileHandle, LOCK_UN);
                    }
                    
                }else{
                    echo "An error occured while trying to append to TheGamers.txt file.<br>\n";
                }
                fclose($fileHandle);
            }

        }
    ?>
    <form action="TheGame.php" method="post" enctype="multipart/form-data">
        First Name:<input type="text" name="fName" ><br>
        Last Name: <input type="text" name="lName" ><br>
        email: <input type="text" name="email" ><br>
        age: <input type="text" name="age" ><br>
        screen name: <input type="text" name= "sName" ><br>
        Username:<input type="text" name="username" ><br>
        Password:<input type="text" name="password"> <br>
        <textarea name="comment" cols="100" rows="6"></textarea> <br>
        <input type="submit" name="submit" value="Upload the File"> <br>
    </form>

</body>
</html>