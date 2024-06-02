<?php

include 'config.php';
session_start();

if (isset($_POST['submit'])) {

    $name = mysqli_real_escape_string($conn, $_POST['full_name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $num = mysqli_real_escape_string($conn, $_POST['number']);
    $pass = mysqli_real_escape_string($conn, $_POST['password']);
    $wilayas = mysqli_real_escape_string($conn, $_POST['wilayas']);
    $communes = mysqli_real_escape_string($conn, $_POST['communes']);

    if (!preg_match('/^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/', $email)) {
        echo '<div id="error-message" style="display:none; color:red;">Invalid email format</div>';
    } else {
        $select = mysqli_query($conn, "SELECT * FROM `users2` WHERE email='$email'") or die('error');
        $selecta = mysqli_query($conn, "SELECT * FROM `users` WHERE email='$email'") or die('error');
        if (mysqli_num_rows($select) > 0 || mysqli_num_rows($selecta) > 0) {
            echo '<div id="error-message" style="display:none; color:red;">This email is already in use</div>';
        } else if (empty($name) || empty($email) || empty($num) || empty($pass) ||  empty($wilayas) || empty($communes)) {
            echo '<div id="error-message" style="display:none; color:red;">All fields are required</div>';
        } else {
            $hashedPassword = password_hash($pass, PASSWORD_DEFAULT);

            $img_name = $_FILES['image']['name'];
            $img_size = $_FILES['image']['size'];
            $tmp_name = $_FILES['image']['tmp_name'];
            $error = $_FILES['image']['error'];

            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
            $img_ex_lc = strtolower($img_ex);
            $allowed_exs = array("jpg", "jpeg", "png");

            if (in_array($img_ex_lc, $allowed_exs)) {
                $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
                $img_upload_path = 'uploads/'.$new_img_name;
                move_uploaded_file($tmp_name, $img_upload_path);

                $insert = mysqli_query($conn, "INSERT INTO `users2`(full_name, email,password, number, wilaya,communes,pp) VALUES('$name', '$email', '$hashedPassword','$num','$wilayas','$communes','$new_img_name')")
                or die('query failed'.mysqli_error($conn));

                if ($insert) {
                    $_SESSION['status'] = "Account created successfully";
                    header('Location: AAB.php');
                } else {
                    $_SESSION['status'] = "Registration failed";
                }
            }
        }
    }
}
?>
