<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Visitor Feeback</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="modernizr.custom.65897"></script>
</head>
<body>
<h2>Visitor Feeback</h2>
    <?php
    $dir = "./comments";
    if(is_dir($dir)){
        $commentFiles = scandir($dir);
        foreach($commentFiles as $fileName){
            if($fileName !== "." && $fileName !== ".."){

                echo "From <strong> $fileName</strong><br>";
                echo "<pre>\n";
                $comments = file_get_contents($dir . "/" . $fileName);
                echo $comments;
                echo "</pre>\n";
                echo "<hr>\n";
            }
            
        }

    }else{
        echo "Folder\"$dir\" does not exsist<br>\n";
    }
    ?>
    
</body>
</html>