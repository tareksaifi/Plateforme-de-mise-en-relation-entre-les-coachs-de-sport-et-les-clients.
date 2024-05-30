<?php
require 'userlogin1.php';
include 'config.php';
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve the form data
    $name = $_POST["name"];
    $email = $_POST["email"];

    if (!empty($name)) {
        $query = "UPDATE users2 SET full_name = '$name' WHERE id = {$_SESSION['userid']}"; // Assuming you have the $userID
        $result = mysqli_query($conn, $query);
    }

    if (!empty($email)) {
        $query = "UPDATE users2 SET email = '$email' WHERE id = {$_SESSION['userid']}"; // Assuming you have the $userID
        $result = mysqli_query($conn, $query);
    }
if(isset($_POST["password"])){
    $passwordupdate = $_POST["password"];
    $passwordupdate1 = $_POST["password1"];

    if (!empty($passwordupdate) && !empty($passwordupdate1)) {
        if ($passwordupdate != $passwordupdate1) {
            echo 'Passwords do not match.';
        } else {
            $passwordupdate = password_hash($passwordupdate, PASSWORD_DEFAULT);
            $query = "UPDATE users2 SET password = '$passwordupdate' WHERE id = {$_SESSION['userid']}"; // Assuming you have the $userID
            $result = mysqli_query($conn, $query);
        }
    } }

    // Check if the update was successful
    if ($result) {
        $_SESSION['display_alert'] = true;
    } else {
        echo "Error updating user information: " . mysqli_error($conn);
    }
}
if (isset($_POST['delete_account'])) {
    // Delete the user account
    $query = "DELETE FROM users2 WHERE id = {$_SESSION['userid']}"; // Assuming you have the $userID
    $result = mysqli_query($conn, $query);

    if ($result) {
        // Perform any additional actions after deleting the account
        // For example: logout the user, redirect to a different page, etc.
        session_destroy();
        header('Location: content7 copy.php');
        exit;
    } else {
        echo "Error deleting user account: " . mysqli_error($conn);
    }
}
?>
