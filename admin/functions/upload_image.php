<?php
if (isset($_FILES['img'])) {
    $image = $_FILES['img'];
    $targetDir = 'admin/public/assets/images/uploads/';
    $targetFile = $targetDir . basename($image['name']);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    $check = getimagesize($image['tmp_name']);
    if ($check === false) {
        echo 'File is not an image.';
        $uploadOk = 0;
    }

    // Check file size
    if ($image['size'] > 1000000) {
        echo 'Sorry, your file is too large.';
        $uploadOk = 0;
    }

    // Allow certain file formats
    if ($imageFileType != 'jpg' && $imageFileType != 'png' && $imageFileType != 'jpeg' && $imageFileType != 'gif') {
        echo 'Sorry, only JPG, JPEG, PNG & GIF files are allowed.';
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo 'Sorry, your file was not uploaded.';
    // If everything is ok, try to upload file
    } else {
        if (move_uploaded_file($image['tmp_name'], $targetFile)) {
            echo 'The file ' . basename($image['name']) . ' has been uploaded.';
        } else {
            echo 'Sorry, there was an error uploading your file.';
        }
    }
}
?>
