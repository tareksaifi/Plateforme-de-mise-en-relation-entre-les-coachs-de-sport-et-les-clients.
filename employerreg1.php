<?php 
include 'config.php';
session_start();
$_SESSION['s1'] = false;

if (isset($_POST['submit'])) {
    $skill = mysqli_real_escape_string($conn, $_POST['skills']);
    $exp = mysqli_real_escape_string($conn, $_POST['experience']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    $specialty = mysqli_real_escape_string($conn, $_POST['specialty']); // New line for specialty
    $name = mysqli_real_escape_string($conn, $_POST['full_name']);
    $instagram = mysqli_real_escape_string($conn, $_POST['instagram']);

    
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $num = mysqli_real_escape_string($conn, $_POST['number']);
    $pass = mysqli_real_escape_string($conn, $_POST['password']);
    $hashedPassword = password_hash($pass, PASSWORD_DEFAULT);
    $img_name = $_FILES['image']['name'];
    $img_size = $_FILES['image']['size'];
    $tmp_name = $_FILES['image']['tmp_name'];
    $error = $_FILES['image']['error'];

    if (!preg_match('/^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/', $email)) {
        echo '<div id="error-message" style="display:none; color:red;">Invalid email format</div>';
    } else {
        $select = mysqli_query($conn, "SELECT * FROM `users` WHERE email='$email'") or die('error');
        $select1111 = mysqli_query($conn, "SELECT * FROM `users` WHERE number='$num'") or die('error');

        if (mysqli_num_rows($select) > 0 || mysqli_num_rows($select1111) > 0) {
            $_SESSION['s1'] = true;
        } else {
            $pass = password_hash($pass, PASSWORD_DEFAULT);
            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
            $img_ex_lc = strtolower($img_ex);
            $allowed_exs = array("jpg", "jpeg", "png");

            if (in_array($img_ex_lc, $allowed_exs)) {
                $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
                $img_upload_path = 'uploads/'.$new_img_name;
                move_uploaded_file($tmp_name, $img_upload_path);

                $insert = mysqli_query($conn, "INSERT INTO `users`(full_name, email, password, number, pp, skills, experience, price, specialties,instagram) VALUES('$name', '$email', '$hashedPassword', '$num', '$new_img_name', '$skill', '$exp', '$price', '$specialty','$instagram')")
                or die('query failed'.mysqli_error($conn));

                if ($insert) {
                    $_SESSION['status'] = "Account created successfully";
                    header('Location: AAB1.php');
                } else {
                    $_SESSION['status'] = "Registration failed";
                }
            }
        }
    }
}
?>