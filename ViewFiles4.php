<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>View Files 4</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="modernizr.custom.65897"></script>
</head>
<body>
<h2>View Files 4</h2>
    <?php
    $dir = "../Exercise02_01_01";
    //puts file in array for us
    $dirEntries = scandir($dir);

    $openDir = opendir($dir);
    //html for a table with lables
    echo "<table border='1' width='100%'";
    echo "<tr><th colspan='4'>Directory listing for <strong>". htmlentities($dir). "</strong></th></tr>\n";
    echo "<tr>";
    echo "<th><strong><em>Name</em></strong></th>";
    echo "<th><strong><em>Owner</em></strong></th>";
    echo "<th><strong><em>Permissions</em></strong></th>";
    echo "<th><strong><em>Size</em></strong></th>";
    echo "</tr>\n";
    //loops through an array of our files
    foreach($dirEntries as $entry){
        if(strcmp($entry, '.') !==0 && strcmp($entry, '..') !== 0){
            $fullEntryName = $dir . "/". $entry;
            //puts the things in the table while also pulling the files and making them hyper links
            echo "<tr><td>";
            if(is_file($fullEntryName)){
                echo "<a href=\"FileDownloader.php?fileName=$entry\">". htmlentities($entry). "</a><br>\n";
            }else{
                echo htmlentities($entry);
            }
            //seeing we can get the owner of the file
            echo "</td><td align='center'>". fileowner($fullEntryName);
            //file permissions
            if(is_file($fullEntryName)){
                $perms = fileperms($fullEntryName);
                $perms = decoct($perms % 01000);
                echo "</td><td align='center'>0$perms";
                echo "</td><td align='right'>". number_format(filesize($fullEntryName),0). " bytes";
            }else{
                echo "</td><td colspan='2' align ='center'>&LT;DIR&GT;";
            }
            
            echo "</tr></td>";
        }
    }
    echo "</table>";
    ?>
</body>
</html>