<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>View Files</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="modernizr.custom.65897"></script>
</head>
<body>
<h2>View Files</h2>
    <?php
    // finding the directory and opening/closing it
    $dir = "../Exercise02_01_01";
    $openDir = opendir($dir);
    while($currFile = readdir($openDir)){
        //gets ride of the dot dot
        if(strcmp($currFile, '.') !==0 && strcmp($currFile, '..') !== 0){
            echo "<a href=\"$dir/$currFile\">$currFile</a><br>\n";
        }
    }
    closedir($openDir);
    
    ?>
</body>
</html>