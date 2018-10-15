<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>BackupComments</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="modernizr.custom.65897"></script>
</head>
<body>
<h2>Backup Comments</h2>
    <?php
    $source = "./comments";
    $destination = "./backups";
    //fail
    if(!is_dir($destination)){
        mkdir($destination);
        chmod($destination,0757);
    }
    //success
    if(is_dir($source)){
        $totalFiles = 0;
        $filesCopied = 0;
        $dirEntries = scandir($source);
        //puts the scaned file into an array
        foreach ($dirEntries as $entry) {
            //if not a reall file
            if($entry !== "." && $entry !== ".."){
                ++$totalFiles;
                if(copy("$source/$entry", "$destination/$entry")){
                    ++$filesCopied;
                }else{
                    echo "Could not copy file \"" . htmlentities($entry) . "\".<br>\n";
                }             
            }
        }
        echo "<p>$filesCopied of $totalFiles files successfully backed up.</p>\n";
    }else{
        echo "The source directory \"$source\" does not exist, nothing to backup.\n";
    }
    ?>
</body>
</html>