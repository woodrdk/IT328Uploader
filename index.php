<?php
/*
* Rob Wood
* 3/8/2020
* Uploading assignment
*/

// Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);
require_once("config-member.php");

function connect()
{
    try {
        //echo "YES";
        return new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
    } catch(PDOException $e) {
        echo $e->getMessage();
        return null;
    }
}

$db = connect();
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
        // var_dump($_FILES); // to test info output

        if (isset($_FILES['fileToUpload'])) {
            $file = $_FILES['fileToUpload'];

            //Define valid file types
            $validTypes = array('image/gif', 'image/jpeg', 'image/jpg', 'image/png');

            //Check file size - 3 MB maximum
            if ($_SERVER['CONTENT_LENGTH'] > 3000000) {
                echo "<p class='error'>File is too large. Maximum file size is 3 MB.</p>";
            }
            //Check file type
            else if (in_array($file['type'], $validTypes)) {

                if ($file['error'] > 0){
                    echo "<p class='error'>Return Code: {$file['error']}</p>";
                }
                //Check for duplicate file
                if (file_exists($dirName . $file['name'])){
                    echo "<p class='error'>Error uploading: ";
                    echo $file['name'].' already exists.</p>';
                }

                else {
                    move_uploaded_file($file['tmp_name'], $dirName . $file['name']);
                    echo "<p class='success'>Uploaded {$file['name']} successfully!</p>";
                    // store the file name in the database
                    $sql = "INSERT INTO uploads(file_id, filename )
                            VALUES (null, '{$file['name']}')";
                    $db->exec($sql);
                }
            }
            //Invalid file type
            else {
                echo "<p class='error'>Invalid file type. Allowed types: gif, jpg, png</p>";
            }

        }
        ?>

    </div>
    <br>
    <div class="image-div">
        <?php
            $dir = opendir($dirName);
            //Get names of files
            $sql = "SELECT * FROM uploads";
            $result = $db->query($sql);
            //Display images
            if (sizeof($result) >= 1) {
                foreach ($result as $row) {
                    $img = $row['filename'];
                    echo "<img src='$dirName$img' alt=''>";
                }
            }
        ?>
    </div>
</div>

<!-- jQuery first, then Popper, then Bootstrap -->
<script src="https://code.jquery.com/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>
