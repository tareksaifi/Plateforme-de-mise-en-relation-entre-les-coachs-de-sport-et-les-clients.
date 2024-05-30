<?php
 session_start();

include 'config.php';

if(isset($_POST['submit'])){

   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));

   $select = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email' AND password = '$pass'") or die('query failed');

   if(mysqli_num_rows($select) > 0){
   

      $row = mysqli_fetch_assoc($select);
      
      //echo  $row['full_name'];
      
      $_SESSION['username'] = $row['full_name'];
      $_SESSION['pp']=$row['pp'];

    //  echo $row['full_name'];
      $_SESSION['userid'] = $row['id'];
     

     header('location:content.php');
   }else{
      $message[] = '<div class="alert alert-danger" role="alert">
      Email ou mot de passe inccorect!
    </div>';
    
   }

}

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="emplogin.css">
    <title>Employer connexion</title>

</head>
<body>
<section class="side"></section>
    
<section class="main">
    <div class="login-container">
        <p class="title">Bienvenue </p>
        <div class="separator"></div>
    <p class="welcome-message">Entrer votre identifiants de connexion pour continuer
        et accédez à tous nos services</p>

      
        <?php
      if(isset($message)){
         foreach($message as $message){
         echo '<div class=\"message\">'.$message.'</div>';
          
            sleep(3);
            unset($message);
            
         }
      }
      
      ?>

        <form class="login-form" method="post" enctype="multipart/form-data">

            <div class="form-control">
                <input type="text"  name="email" placeholder="Email">
                <i class="fas fa-user"></i>
            </div>
            <div class="form-control">
                <input type="password" name="password" placeholder="Mot de pass">
                <i class="fas fa-lock"></i>
            </div>
            <button class="submit" name="submit">Se connecter</button>
        </form>
    </div>
</section>


</body>
</html>