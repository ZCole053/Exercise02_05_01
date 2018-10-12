<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Visitor Comments3 </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="modernizr.custom.65897"></script>
</head>

<body>
    <?php
    //variables
    $dir = "./comments";
    //checing if it is a directory
    if(is_dir($dir)){
        // checking to see if it had been submited
        if(isset($_POST['save'])){
            //checking to see if data is recieved
            if(empty($_POST['name'])){
                echo "Unknown Visitor\n";
            }else{
                $saveString = stripslashes($_POST['name']) . "\n";
                $saveString .= stripslashes($_POST['email']) . "\n";
                $saveString .= date('r') . "\n";
                $saveString .= stripslashes($_POST['comment']) . "\n";
                echo "\$saveString: $saveString";//debug
                $currentTime = microtime();
                $timeArray = explode(" ", $currentTime);
                echo var_dump($timeArray) . "<br>";//debug
                $timeStamp = (float)$timeArray[1] + (float)$timeArray[0]; 
                echo "\$timeStamp: $timeStamp<br>";//debug
                $saveFileName = "$dir/Comment.$timeStamp.txt";
                echo "\$saveFileName: $saveFileName<br>";//debug

                //opens the file make it writable\binary mode
                $fileHandle = fopen($saveFileName, "wb");
                //failure
                if($fileHandle === false){
                    echo "There was an error creating \"". htmlentities($saveFileName) . "\".<br>\n";
                    //success
                }else{        
                    //  
                    if(flock($fileHandle, LOCK_EX)){
                        //success means fwrite is > 0\
                        if(fwrite($fileHandle, $saveString) > 0 ){
                            echo "Successfully wrote to file  \"". htmlentities($saveFileName) . "\".<br>\n";
                        }else{
                            echo "There was an error writting to \"". htmlentities($saveFileName) . "\".<br>\n";
                        }
                        flock($fileHandle, LOCK_UN);
                    }else{
                        echo "There was an error locking file \"". htmlentities($saveFileName) . "\".<br>\n";
                    }
                    fclose($fileHandle);
                }

                if(file_put_contents($saveFileName, $saveString) > 0){
                    echo "File \"" . htmlentities($saveFileName) . "\" successfully saved.<br>\n";

                }else{
                    echo "There was an error writing \"" . htmlentities($saveFileName) . "\".<br>\n";
                }
            }
        }
    }else{
        //creates directory if not found
        mkdir($dir);
        chmod($dir, 0757);
    }
    ?>
    <!-- web form -->
    <h2>Visitor Comments 3</h2>
    <form action="VisitorComments2.php" method="post">
        Your name: <input type="text" name="name"> <br>
        Your email: <input type="email" name="email"> <br>
        <textarea name="comment" cols="100" rows="6">
        </textarea> <br>
        <input type="submit" name="save" value="Submit Your Comment" >
    </form>

</body>

</html>