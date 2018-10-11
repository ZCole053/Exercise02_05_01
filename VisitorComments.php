<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Visitor Comments</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="modernizr.custom.65897"></script>
</head>

<body>
    <?php
    $dir = "./comments";
    if(is_dir($dir)){
        if(isset($_POST['save'])){
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
                if(file_put_contents($saveFileName, $saveString) > 0){
                    echo "File \"" . htmlentities($saveFileName) . "\" successfully saved.<br>\n";

                }else{
                    echo "There was an error writing \"" . htmlentities($saveFileName) . "\".<br>\n";
                }
            }
        }
    }else{
        mkdir($dir);
        chmod($dir, 0757);
    }
    ?>
    <h2>Visitor Comments</h2>
    <form action="VisitorComments.php" method="post">
        Your name: <input type="text" name="name"> <br>
        Your email: <input type="email" name="email"> <br>
        <textarea name="comment" cols="100" rows="6">
        </textarea> <br>
        <input type="submit" name="save" value="Submit Your Comment" >
    </form>

</body>

</html>