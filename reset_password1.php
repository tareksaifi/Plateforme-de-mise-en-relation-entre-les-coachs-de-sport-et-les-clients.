<?php
include 'config.php';
require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'vendor/phpmailer/phpmailer/src/SMTP.php';
require 'vendor/phpmailer/phpmailer/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function generateToken($length = 32) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $token = '';

    for ($i = 0; $i < $length; $i++) {
        $randomIndex = random_int(0, strlen($characters) - 1);
        $token .= $characters[$randomIndex];
    }

    return $token;
}

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$errorMsg = ''; 

if (isset($_POST['submit'])) {
    $email = $_POST['email'];

    $stmt = mysqli_prepare($conn, "SELECT * FROM users2 WHERE email = ?");
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $token = generateToken(); 
        $expirationTime = date('Y-m-d H:i:s', time() + (24 * 60 * 60)); 

        $stmt = mysqli_prepare($conn, "UPDATE users2 SET reset_token = ?, reset_token_expiration = ? WHERE email = ?");
        mysqli_stmt_bind_param($stmt, "sss", $token, $expirationTime, $email);
        mysqli_stmt_execute($stmt);

        if (mysqli_stmt_affected_rows($stmt) > 0) {
            $resetLink = "http://localhost/cr1/reset_password_form1.php?token=" . $token; 

            $mail = new PHPMailer(true);

            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'manopro.service@gmail.com';
            $mail->Password   = '******';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port       = 465;

            // Set the sender and recipient
            $mail->setFrom('manopro.service@gmail.com', 'ManoPro');
            $mail->addAddress($email);

            // Set the email subject and body
            $mail->Subject = 'Password Reset';
            $mail->Body = "Dear user,\n\nTo reset your password, click on the link below:\n\n" . $resetLink;

            // Send the email
            try {
                $mail->send();
                echo '<div class="alert alert-success">An email has been sent to your email address with instructions to reset your password.</div>';
            } catch (Exception $e) {
                echo '<div class="alert alert-danger">Failed to send the email. Error: ' . $mail->ErrorInfo . '</div>';
            }
        } else {
            echo '<div class="alert alert-danger">Failed to update the reset token in the database.</div>';
        }
    } else {
        // Display an error message if the email does not exist in the database
        echo '<div class="alert alert-danger">Email not found.</div>';
    }
}
?>


<!DOCTYPE html>
<html>
<head>
  <title>Password Reset</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    body {
      background:  blur(10px);

background: radial-gradient(circle at 18.7% 37.8%, rgb(250, 250, 250) 0%, rgb(225, 234, 238) 90%);      }

    .container {
      margin-top: 100px;
    }

    .card {
      border: none;
      border-radius: 8px;
      box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1);
      box-shadow: 10px 10px 20px rgba(0, 0, 0, 0.2);
    }

    .card-header {
      background-color: #007bff;
      border-radius: 8px 8px 0 0;
      color: #fff;
      font-weight: bold;
      
    }

    .card-body {
      padding: 20px;
    }

    .form-group label {
      font-weight: bold;
    }

    .btn-blue {
      background-color: #007bff;
      border-color: #007bff;
    }

    .btn-blue:hover {
      background-color: #0056b3;
      border-color: #0056b3;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8 col-lg-6">
        <div class="card">
          <div class="card-header text-center">
            <h1>Password Reset</h1>
          </div>
          <div class="card-body">
            <form method="POST" action="">
              <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="Enter your email address" required>
              </div>
              <div class="text-center">
                <button type="submit" name="submit" class="btn btn-blue btn-block">Reset Password</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

