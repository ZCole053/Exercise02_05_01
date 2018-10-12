<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Visitor Feeback 3</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="modernizr.custom.65897"></script>
</head>
<body>
<h2>Visitor Feeback 3</h2>
<!-- good for formatting -->
    <?php
    $dir = "./comments";
    if(is_dir($dir)){
        $commentFiles = scandir($dir);
        foreach($commentFiles as $fileName){
            if($fileName !== "." && $fileName !== ".."){
                echo "From <strong> $fileName</strong><br>";
                //seperates thing at newline and puts it into an array
                $comments = file($dir . "/" . $fileName);
                echo "From: " . htmlentities($comments[0]) . "<br>\n";
                echo "Email address: " . htmlentities($comments[1]) . "<br>\n";
                echo "Date: " . htmlentities($comments[2]) . "<br>\n";
                $commentLines = count($comments);
                //shows the coments and splits them by newlines
                for($i = 3;$i < $commentLines; $i++){
                    echo htmlentities($comments[$i]) . "<br>\n";
                }
                echo "<hr>\n";
            }
            
        }

    }else{
        echo "Folder\"$dir\" does not exsist<br>\n";
    }
    ?>
    
</body>
</html>