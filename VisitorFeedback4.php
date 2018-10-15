<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Visitor Feedback 4</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="modernizr.custom.65897"></script>
</head>
<body>
<h2>Visitor Feedback 4</h2>
<!-- good for formatting -->
    <?php
    $dir = "./comments";
    if(is_dir($dir)){
        $commentFiles = scandir($dir);
        foreach($commentFiles as $fileName){
            if($fileName !== "." && $fileName !== ".."){
                echo "From <strong> $fileName</strong><br>";
                //open file with support
                $fileHandle = fopen($dir . "/". $fileName, "rb");
                //fail
                if($fileHandle === false){
                    echo "There was an error reading file \"$fileName\".<br>\n";
                //success
                }else{
                    //get string and reads file till it encountersa new line
                    $from = fgets($fileHandle);
                    echo "From: " . htmlentities($from) . "<br>\n";
                    //gets data records by record or newline.
                    $email = fgets($fileHandle);
                    echo "Email address: " . htmlentities($email) . "<br>\n";
                    $date = fgets($fileHandle);
                    echo "Date: " . htmlentities($date) . "<br>\n";
                    $comment = "";
                    //created while loop to check for endoffile so all comments with \n will display
                    while(!feof($fileHandle)){
                        $comment = fgets($fileHandle);
                        echo htmlentities($comment) . "<br>\n";
                    }
                    echo "<hr>\n";
                    fclose($fileHandle);
                }  
            }
        }

    }else{
        echo "Folder\"$dir\" does not exsist<br>\n";
    }
    ?>
    
</body>
</html>