<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>FileUploader</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="modernizr.custom.65897"></script>
</head>

<body>
    <h2>File Uploader</h2>
    <?php
    $dir = ".";
    //checks to see if it has been submitted
    if(isset($_POST['upload'])){
        //
        if(isset($_FILES['newFile'])){
            //echo print_r($_FILES['newFile']); debug
            //if else to move file                  //multi dimntional array
            if(move_uploaded_file($_FILES['newFile']['tmp_name'], $dir . "/". $_FILES['newFile']['name']) === true){
                //read and write the read and read
                //chmod($dir . "/". $_FILES['newFile']['name'], 0644);
                echo "File \"". htmlentities($_FILES['newFile']['name']) . "\" successfully uploaded.<br>\n";
            }else{
                echo "There was an error uploading \"". htmlentities($_FILES['newFile']['name']) . "\".<br>\n";
            }
        }

    }
    ?>
    <form action="FileUploader.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="MAX_FILE_SIZE" value="25000">
        file to upload:
        <input type="file" name="newFile"><br>
        (25,000 byte limit)<br>
        <input type="submit" name="upload" value="Upload the File"><br>
    </form>
</body>

</html>