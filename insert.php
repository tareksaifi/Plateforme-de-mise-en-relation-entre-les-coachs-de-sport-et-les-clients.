<?php

include('profig.php'); // Ensure this file correctly initializes $pro

if (isset($_POST['upload'])) {
    $NAME = $_POST['name'];
    $PRICE = $_POST['price'];
    $IMAGE = $_FILES['image'];
    $des=$_POST['description'];
    $image_location = $_FILES['image']['tmp_name'];
    $image_name = $_FILES['image']['name'];

    // Get the file extension
    $image_extension = pathinfo($image_name, PATHINFO_EXTENSION);

    // Generate a unique name for the image
    $unique_image_name = uniqid() . '.' . $image_extension;

    // Full path for the uploaded image
    $image_up = "images/" . $unique_image_name;

    // Debugging: Check file upload status
    if ($IMAGE['error'] !== UPLOAD_ERR_OK) {
        echo "<script>alert('File upload error: " . $IMAGE['error'] . "');</script>";
        exit();
    }

    // Insert data into the database
    $insert = "INSERT INTO prod (name,description, price, image) VALUES ('$NAME','$des', '$PRICE', '$image_up')";
    if (mysqli_query($pro, $insert)) {
        // Move uploaded file to target directory
        if (move_uploaded_file($image_location, $image_up)) {
            echo "<script>alert('تم رفع المنتج بنجاح');</script>";
        } else {
            // Debugging: Output the error
            echo "<script>alert('حدث مشكلة في رفع البيانات: Could not move uploaded file');</script>";
        }
    } else {
        // Debugging: Output the MySQL error
        echo "<script>alert('حدث خطأ في إدخال البيانات في قاعدة البيانات: " . mysqli_error($pro) . "');</script>";
    }

    header('Location: protin.php'); // Ensure header is called after any potential output
    exit(); // Exit to ensure no further code is executed after the redirect
}
?>
