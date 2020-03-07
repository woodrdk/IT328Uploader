<?php
/*
* Rob Wood
* 1/18/2020
* This is a dating app website for class IT328
* This file routes the users at the index to the home page using FatFree Framework
*/

// Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);
//require_once ('vendor/autoload.php');
require_once("config-member.php");

//$db = new DatabaseFile();
$dirName = 'uploads/';



?>

<!doctype html>
<html>
<head>
    <title>Uploader Assignment</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<div class="container" id="main">
    <div class="jumbotron bg-success" >
        <h1 class="display-4 font-weight-bold">Uploader Assignment</h1>
        <p class="lead font-weight-bold">GRC Software Dev IT328</p>
        <p class="font-italic text-right">Robert Wood Jr.</p>
        <p class="font-italic text-right">3/6/2020</p>
        <hr class="my-2">
    </div>
    <div class="container">
        <h1>File Uploader</h1>
        <h2>Select a file to upload</h2>
        <h2>Valid file types include jpg and gif</h2>

        <form action="#"" method="post" enctype="multipart/form-data">
        <input type="file" name="fileToUpload" >
        <input type="submit" value="Upload File" name="submit">
        </form>
        <?php
            var_dump($_FILES);
        ?>
    </div>
</div>

<!-- jQuery first, then Popper, then Bootstrap -->
<script src="https://code.jquery.com/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>
