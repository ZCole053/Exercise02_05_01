<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>View Files 2</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="modernizr.custom.65897"></script>
</head>
<body>
<h2>View Files 2</h2>
    <?php
    $dir = "../Exercise02_01_01";
    //opens and closed the document for us
    $dirEntries = scandir($dir);

    $openDir = opendir($dir);
    //loops through an array of our files
    foreach($dirEntries as $entry){
        if(strcmp($entry, '.') !==0 && strcmp($entry, '..') !== 0){
            echo "<a href=\"$dir/$entry\">$entry</a><br>\n";
        }
    }

    
    
    ?>
</body>
</html>