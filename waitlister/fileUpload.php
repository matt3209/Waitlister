<?php

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $uploadDir = "/var/www/students/heidem57/FastApp/uploads";
    if ($_FILES["fileToUpload"]["error"] == UPLOAD_ERR_OK) {
        $tmp_name = $_FILES["fileToUpload"]["tmp_name"];

        $name = basename($_FILES["fileToUpload"]["name"]);

        move_uploaded_file($tmp_name, "$uploadDir/$name");

        header("location: ./dashboard.php");
    }
}
?>