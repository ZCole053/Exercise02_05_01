<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Visitor Comments</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="modernizr.custom.65897"></script>
</head>

<body>
    <?php
    $dir = "./comments";
    if(is_dir($dir)){

    }else{
        mkdir($dir);
        chmod($dir, 0666);
    }
    ?>
    <h2>Visitor Comments</h2>
    <form action="VisitorComments.php" method="post">
        Your name: <input type="text" name="name"> <br>
        Your email: <input type="email" name="email"> <br>
        <textarea name="comment" cols="100" rows="6">
        </textarea> <br>
        <input type="submit" name="save" value="Submit Your Comment" >
    </form>

</body>

</html>