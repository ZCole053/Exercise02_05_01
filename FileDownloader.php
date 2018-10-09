<?php
    $dir = "../Exercise02_01_01";
    //sucess //checking for slashes
    if(isset($_GET['fileName'])){
        $fileToGet =  $dir. "/". stripslashes($_GET['fileName']);
        if(is_readable($fileToGet)){
            //file headers
            header("Content-Description: File Transfer");
            header("Content-Type: application/force-download");
            header("Content-Disposition: attachment; fileName=\"".$_GET['fileName']. "\"");
            header("Content-Transfer-Encoding: base64");
            header("Content-Length: " .filesize($fileToGet));
            readfile($fileToGet);
            $errorMsg = "";
            $showErrorPage = false;
        }else{
            $errorMsg = "Can not read \"$fileToGet\"";
            $showErrorPage = true;
        }
    //fail
    }else{
        $errorMsg = "No file name specified";
        $showErrorPage = true;
    }

    //sticky
    if($showErrorPage){
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>File Download Error</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="modernizr.custom.65897"></script>
</head>
<body>
    <!-- portects against bad characters and the displays error message -->
    <p>There was an error downloading "<?php echo htmlentities($_GET['fileName']); ?></p>
    <p><?php echo htmlentities($errorMsg);  ?></p>
</body>
</html>
    <?php
    }
    ?>

