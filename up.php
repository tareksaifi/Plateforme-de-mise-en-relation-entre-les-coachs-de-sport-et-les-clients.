<?php
include('profig.php'); // Ensure this file correctly initializes $pro

if (isset($_POST['update'])) {
    $ID = $_POST['id'];
    $NAME = $_POST['name'];
    $PRICE = $_POST['price'];
    $IMAGE = $_FILES['image'];
    $image_location = $_FILES['image']['tmp_name'];
    $image_name = $_FILES['image']['name'];

    // Initialize $image_up variable
    $image_up = '';

    if (!empty($image_name)) {
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

        // Move uploaded file to target directory
        if (!move_uploaded_file($image_location, $image_up)) {
            echo "<script>alert('حدث مشكلة في تنزيل البيانات: Could not move uploaded file');</script>";
            exit();
        }

        // If an image was uploaded, include it in the update query
        $update = "UPDATE prod SET name = '$NAME', price = '$PRICE', image = '$image_up' WHERE id = $ID";
    } else {
        // If no image was uploaded, update only name and price
        $update = "UPDATE prod SET name = '$NAME', price = '$PRICE' WHERE id = $ID";
    }

    if (mysqli_query($pro, $update)) {
        echo "<script>alert('تم تحديث المنتج بنجاح');</script>";
    } else {
        // Debugging: Output the MySQL error
        echo "<script>alert('حدث خطأ في إدخال البيانات في قاعدة البيانات: " . mysqli_error($pro) . "');</script>";
    }

    // Redirect after the update process
    header('Location: products.php'); // Make sure this path is correct
    exit(); // Exit to ensure no further code is executed after the redirect
}
?>
