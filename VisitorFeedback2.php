<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Visitor Feeback 2</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="modernizr.custom.65897"></script>
</head>
<body>
<h2>Visitor Feeback 2</h2>
<!-- good for formatting -->
    <?php
    $dir = "./comments";
    if(is_dir($dir)){
        $commentFiles = scandir($dir);
        foreach($commentFiles as $fileName){
            if($fileName !== "." && $fileName !== ".."){

                echo "From <strong> $fileName</strong><br>";
                echo "<pre>\n";
                //reads the file and imediatly sent out to the browser
                readfile($dir . "/" . $fileName);//toook away variable and did read file
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