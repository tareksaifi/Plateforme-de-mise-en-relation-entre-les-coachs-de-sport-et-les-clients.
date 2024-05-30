<?php
include 'config.php';
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$message=NULL;

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prepare the SQL statement using a prepared statement
    $stmt = mysqli_prepare($conn, "SELECT * FROM `users2` WHERE email = ?");
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $hashedPassword = $row['password'];

        // Verify the entered password using password_verify

        if (password_verify($password, $hashedPassword)) {

            $_SESSION['username'] = $row['full_name'];
            $_SESSION['pp'] = $row['pp'];
            $_SESSION['userid'] = $row['id'];
            $_SESSION['type']="user";
            $_SESSION['role']="user";
            header('Location: content7 copy.php');
            // After verifying the login credentials
$_SESSION['logged_in'] = true;
// Redirect to the desired page
            exit;
        } else {
            $message = '<div class="alert alert-danger" role="alert">Email ou mot de passe incorrect!</div>';
        }
    } else {
        $message = '<div class="alert alert-danger" role="alert">Email ou mot de passe incorrect!</div>';
    }
}
?>
