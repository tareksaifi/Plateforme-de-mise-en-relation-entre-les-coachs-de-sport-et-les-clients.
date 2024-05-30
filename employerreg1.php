<?php

include 'config.php';
session_start();
$_SESSION['s1']=false;


require 'vendor\phpmailer\phpmailer\src\PHPMailer.php';
require 'vendor\phpmailer\phpmailer\src\SMTP.php';
require 'vendor\phpmailer\phpmailer\src\Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';
function sendemail_verify($name,$email,$verify_token){
    
    $mail = new PHPMailer(true);
 //Server settings
 //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
 $mail->isSMTP();                                            //Send using SMTP
 $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
 $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
 $mail->Username   = 'manopro.service@gmail.com';                     //SMTP username
 $mail->Password   = 'rmihlbidobbampbf';                               //SMTP password
 $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
 $mail->Port       = 578;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`


 
 //Recipients
 $mail->setFrom('manopro.service@gmail.com', 'ManoPro');
 $mail->addAddress($email, $name);     //Add a recipient
 //$mail->addAddress('ellen@example.com');               //Name is optional
 $mail->addReplyTo('manopro.service@gmail.com', 'Information');
 //$mail->addCC('cc@example.com');
 //$mail->addBCC('bcc@example.com');

 //Attachments
 //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
 //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

 //Content
 $mail->isHTML(true);                                  //Set email format to HTML
 $mail->Subject = 'Confirmation de mail';
 $mail->Body    = "<!DOCTYPE html>
 <html>
 <head>
     <title>Email Verification</title>
     <style>
     .container {
       background-color: #f5f5f5;
       color: #333333;
       font-family: Arial, sans-serif;
       padding: 20px;
       text-align: center;
     }
     h1 {
       font-size: 30px;
       margin-bottom: 20px;
     }
     p {
       font-size: 16px;
       margin: 10px 0;
     }
     .blue {
       color: #0071c5;
       font-weight: bold;
     }
     .white {
       color: #ffffff;
       font-weight: bold;
     }
     .btn {
       background-color: #0071c5;
       border-radius: 5px;
       display: inline-block;
       margin: 20px 0;
       padding: 10px 20px;
       text-decoration: none;
     }
     .btn:hover {
       background-color: #005a9e;
     }
     .btn span {
       font-size: 18px;
     }
   </style>
 </head>
 <body>
     <div class='container'>
     <h1>Email Verification</h1>
     <p>Dear <span class='blue'>$name</span>,</p>
     <p>Thank you for registering with <span style='color: #ed6729;' class='white'>ManoPro</span>. Please click the button below to verify your email address and activate your account:</p>
     <a href='http://localhost/cr1/verify-email copy.php?token=$verify_token' class='btn'style='color: #ed6729;'><span class='white'>Verify Email Address</span></a>
     <p>If you did not create an account with <span class='white' style='color: #ed6729;'>ManoPro</span>, please ignore this email.</p>
 </div>
 
     
 </body>
 </html>
 ";

 $mail->AltBody = 'This is the body in plain text for non-HTML mail clients  /br <a href="http://localhost/cr1/verify-email.php?token=$verify_token">Click Me </a>';

 $mail->send();
 //echo 'Message has been sent';
 //echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}



if (isset($_POST['submit'])) {



    $skill= mysqli_real_escape_string($conn, $_POST['skills']);
    $exp=  mysqli_real_escape_string($conn, $_POST['experience']);
    $price=  mysqli_real_escape_string($conn, $_POST['price']);
    $verify_token=md5(rand());
    $name = mysqli_real_escape_string($conn, $_POST['full_name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $num = mysqli_real_escape_string($conn, $_POST['number']);
    $pass = mysqli_real_escape_string($conn, $_POST['password']);
    
   // $salt = random_bytes(16); 
    $hashedPassword = password_hash($pass, PASSWORD_DEFAULT);

    $img_name = $_FILES['image']['name'];
	$img_size = $_FILES['image']['size'];
	$tmp_name = $_FILES['image']['tmp_name'];
	$error = $_FILES['image']['error'];


   
   

    if (!preg_match('/^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/', $email)) {

        echo '<div id="error-message" style="display:none; color:red;">Invalid email format</div>';

    }
   
        $select = mysqli_query($conn, "SELECT * FROM `users` WHERE email='$email'") or die('error');
       
        $select1111 = mysqli_query($conn, "SELECT * FROM `users` WHERE number='$num'") or die('error');
       
        if (mysqli_num_rows($select) > 0) {
        
        $s1=true;
        $_SESSION['s1']=true;
        } 
        else if (mysqli_num_rows($select1111) > 0) {
          $_SESSION['s1']=true;

      } 
      //  else if(empty($name) || empty($email) || empty($num) || empty($pass) || empty($exp) || empty($exper) || empty($skill)|| empty($price)) {
          //  echo '<div id="error-message" style="display:none; color:red;">Tous les case sont require</div>';          
       // }
         else {
            $pass = password_hash($pass, PASSWORD_DEFAULT);
          
            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
			$img_ex_lc = strtolower($img_ex);

			$allowed_exs = array("jpg", "jpeg", "png"); 
            if (in_array($img_ex_lc, $allowed_exs)) {
                $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
				$img_upload_path = 'uploads/'.$new_img_name;
				move_uploaded_file($tmp_name, $img_upload_path);


           
            $insert = mysqli_query($conn, "INSERT INTO `users`(full_name, email,password, number, pp,verify_token,skills,experience,price) VALUES('$name', '$email', '$hashedPassword','$num','$new_img_name','$verify_token','$skill','$exp','$price')")
            or die('query failed'.mysqli_error($conn));
          
           if($insert)
            {
               
              
    sendemail_verify($name,$email,$verify_token);
    $_SESSION['status']="Compte cree avec succees";
    header('Location : AAB1.php');
       
             }
             else{
                $_SESSION['status']="Register failed";

             }
           
            }
            

        }
    }


?>