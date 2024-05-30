<?php
// Assuming you have already established a database connection
require 'employerlogin1.php';
$update=false;

if ($_SESSION['logged_in1'] == false) {
    header('Location: AAB1.php');
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Check if the array keys exist in the $_POST array
    $wilaya = isset($_POST["wilayas"]) ? $_POST["wilayas"] : "";
    $communes = isset($_POST["communes"]) ? $_POST["communes"] : "";
    $name = isset($_POST["name"]) ? $_POST["name"] : "";
    $email = isset($_POST["email"]) ? $_POST["email"] : "";
    $passwordupdate = isset($_POST["password"]) ? $_POST["password"] : "";
    $passwordupdate1 = isset($_POST["password1"]) ? $_POST["password1"] : "";

    // Update the user information in the database
    if (!empty($wilaya) && !empty($communes)) {
        $query = "UPDATE users SET wilaya = '$wilaya', communes = '$communes' WHERE id = {$_SESSION['userid1']}";
        $result = mysqli_query($conn, $query);
    }

    if (!empty($name)) {
        $query = "UPDATE users SET full_name = '$name' WHERE id = {$_SESSION['userid1']}";
        $result = mysqli_query($conn, $query);
    }

    if (!empty($email)) {
        $query = "UPDATE users SET email = '$email' WHERE id = {$_SESSION['userid1']}";
        $result = mysqli_query($conn, $query);
    }

    if (!empty($passwordupdate) && !empty($passwordupdate1)) {
        if ($passwordupdate !== $passwordupdate1) {
            echo 'Passwords do not match.';
        } else {
            $passwordupdate = password_hash($passwordupdate, PASSWORD_DEFAULT);
            $query = "UPDATE users SET password = '$passwordupdate' WHERE id = {$_SESSION['userid1']}";
            $result = mysqli_query($conn, $query);
        }
    }

    // Check if the update was successful
    if ($result) {
        $_SESSION['display_alert'] = true;

        $update=true;
    } else {
        echo "Error updating user information: " . mysqli_error($conn);
    }
}
if (isset($_POST['delete_account'])) {
    // Delete the user account
    $query = "DELETE FROM users WHERE id = {$_SESSION['userid']}"; // Assuming you have the $userID
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
