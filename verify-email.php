<?php 
session_start();
include 'config.php';
if(isset($_GET['token']))
{
    $token = $_GET['token'];
    $verify_query = "SELECT verify_token, verify_status FROM users2 WHERE verify_token = '$token' LIMIT 1";
    $verify_query_run = mysqli_query($conn, $verify_query);
    if(mysqli_num_rows($verify_query_run) > 0){
        $row = mysqli_fetch_array($verify_query_run);
        if($row['verify_status'] == "0")
        {
            $clicked_token = $row['verify_token'];
            $update_query = "UPDATE users2 SET verify_status='1' WHERE verify_token='$clicked_token' LIMIT 1";
            $update_query_run = mysqli_query($conn, $update_query);
            if($update_query_run){
                $_SESSION['status'] = "<h1>Votre compte a été vérifié</h1>";
                header("Location: AAB.php");
            }
            else{ 
                $_SESSION['status'] = "Cette page n'existe pas ou a expiré2";
                header("Location: AAB.php");
            }
        }
        else{
            $_SESSION['status'] = "Votre compte a été vérifié";
            header("Location: AAB.php");
        }
    }
    else{
        $_SESSION['status'] = "Cette page n'existe pas ou a expiré1";
        header("Location: AAB.php");
    }
}
else{
    $_SESSION['status'] = "Not allowed";
    header("Location: AAB.php");
}
?>
