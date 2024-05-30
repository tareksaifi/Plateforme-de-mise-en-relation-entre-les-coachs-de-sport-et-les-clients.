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

$errorMsg = ''; // Variable to store the error message

if (isset($_POST['submit'])) {
    $email = $_POST['email'];

    // Check if the email exists in the database
    $stmt = mysqli_prepare($conn, "SELECT * FROM `users` WHERE email = ?");
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $token = generateToken(); // Generate a unique token
        $expirationTime = date('Y-m-d H:i:s', time() + (24 * 60 * 60)); // Set the expiration time to 24 hours from now

        $stmt = mysqli_prepare($conn, "UPDATE `users` SET reset_token = ?, reset_token_expiration = ? WHERE email = ?");
        mysqli_stmt_bind_param($stmt, "sss", $token, $expirationTime, $email);
        mysqli_stmt_execute($stmt);
        
        

        // Send the password reset email to the user
        $resetLink = "http://localhost/cr1/reset_password_form.php?token=" . $token; // Replace with your website URL

        // Instantiate PHPMailer
        $mail = new PHPMailer(true);

        // Set the SMTP configuration for Gmail
        $mail->isSMTP();                                            //Send using SMTP
 $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
 $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
 $mail->Username   = 'manopro.service@gmail.com';                     //SMTP username
 $mail->Password   = '******';                               //SMTP password
 $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
 $mail->Port       = 465;    
        // Set the sender and recipient
        $mail->setFrom('manopro.service@gmail.com', 'ManoPro'); // Replace with your email address and name
        $mail->addAddress($email); // Email address of the recipient

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

  background: radial-gradient(circle at 18.7% 37.8%, rgb(250, 250, 250) 0%, rgb(225, 234, 238) 90%);     }
    .container {
      margin-top: 100px;
    }

    .card {
      border: none;
      border-radius: 8px;
      box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1);
    }

    .card-header {
      background-color: orange;
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

    .btn-orange {
      background-color: orange;
      border-color: orange;
    }

    .btn-orange:hover {
      background-color: darkorange;
      border-color: darkorange;
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
                <button type="submit" name="submit" class="btn btn-orange btn-block">Reset Password</button>
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






