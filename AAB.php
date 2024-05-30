<?php 
require 'userlogin1.php';




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="AAB.css">
    <title>Login</title>
</head>
<body>
    <style>
        body {
  background:  blur(10px);

  background: linear-gradient(178.6deg, rgb(232, 245, 253) 3.3%, rgb(252, 253, 255) 109.6%);     }
    </style>
    <style>
  .form-container {
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
  }
</style>
    <div class="container">

        <form method="POST" enctype="multipart/form-data">

        <div class="form-group">
    <h2>Connexion</h2>

   <?php
    if (isset($_SESSION['status'])) {
        if ($_SESSION['status'] == "Votre compte a été vérifié") {
            echo '<div class="alert alert-success">' . $_SESSION['status'] . '</div>';
            unset($_SESSION['status']);
        } else {
            echo '<h5>' . $_SESSION['status'] . '</h5>';
            unset($_SESSION['status']);
        }
    }
    if(isset(          $_SESSION['verify_status']
    )){ echo '<div class="alert alert-warning">Votre compte n\'est pas vérifié.</div>';
        unset($_SESSION['verify_status']);
    }
    ?>
   <?php echo $message; ?>
    
    <label for="email">Adresse e-mail</label>
    <input type="email" id="email" name="email" class="form-control" placeholder="Entrez votre adresse e-mail" required>

    <label for="password">Mot de passe</label>
    <input type="password" id="password" name="password" class="form-control" placeholder="Entrez votre mot de passe" required>
</div>

            <button name="submit" value="submit" type="submit" class="submit-btn">Se connecter</button>
            <p class="form-message">Vous n'avez pas de compte? <a href="AA.php">Inscrivez-vous</a></p>
            <p class="form-message"><a href="reset_password1.php">Mot de passe oublié?</a></p>
            <p class="form-message"><a style="color: #fc9938;" href="AAB1.php">Vous etes un technicien?</a></p>
            <p class="form-message" ><a style="color:#0083FD" href="content7 copy.php">Continue sans Connexion</a></p>


        </form>

    </div>
</body>
</html>
