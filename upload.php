<?php
require_once "php/helpers.php";

# TODO: chunk uploading

$dir = "games";
$uploadOk = true;

$targetFile = "$dir/$_POST[gameTitle].zip";
$fileType = strtolower(pathinfo($_FILES["gameZip"]["name"], PATHINFO_EXTENSION));

print_r($_POST);
echo "<br>";
print_r($_FILES);
echo "<br>";
print($fileType);
echo "<br>";

if ($fileType == "zip") {
    if (file_exists($targetFile)) {
        echo "Game already exists!";
    } else {
        if (move_uploaded_file($_FILES["gameZip"]["tmp_name"], $targetFile)) {
            redirect("index.php");
        } else {
            echo "Upload failed";
        }
    }
} else {
    echo "Only zip files are allowed!";
}