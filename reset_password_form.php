<?php
include 'config.php';

// Check if the database connection is established successfully
if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Réinitialisation du mot de passe</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
        body {
  background:  blur(10px);

  background: radial-gradient(circle at 18.7% 37.8%, rgb(250, 250, 250) 0%, rgb(225, 234, 238) 90%);     }
    .container {
      margin-top: 50px;
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

    .alert {
      margin-top: 20px;
      padding: 10px;
      border-radius: 8px;
    }

    .alert-success {
      background-color: #d4edda;
      border-color: #c3e6cb;
      color: #155724;
    }

    .alert-danger {
      background-color: #f8d7da;
      border-color: #f5c6cb;
      color: #721c24;
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
            <?php
              if (isset($_GET['token'])) {
                $token = $_GET['token'];

                $stmt = mysqli_prepare($conn, "SELECT * FROM `users` WHERE reset_token = ?");
                mysqli_stmt_bind_param($stmt, "s", $token);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);

                if (mysqli_num_rows($result) > 0) {
                  $row = mysqli_fetch_assoc($result);
                  $expirationTime = $row['reset_token_expiration'];

                  if ($expirationTime >= time()) {
                    ?>
                    <form method="POST" action="">
                      <input type="hidden" name="token" value="<?= $token ?>">
                      <div class="form-group">
                        <label for="password">Nouveau Mot de passe</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Enter your new password" required>
                      </div>
                      <div class="form-group">
                        <label for="confirm_password">Confirm  Mot de passe</label>
                        <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Confirm your new password" required>
                      </div>
                      <div class="text-center">
                        <button type="submit" name="submit" class="btn btn-orange btn-block">Realiser le mot de passe</button>
                      </div>
                    </form>
                    <?php
                  } else {
                    echo '<div class="alert alert-danger">Invalid or expired token. Please try again.</div>';
                  }
                } else {
                  // Display an error message if the token does not exist in the database
                  echo '<div class="alert alert-danger">Invalid or expired token. Please try again.</div>';
                }
              } else {
                // Redirect to the password reset request page if the token is not provided
                header('Location: reset_password.php');
                exit;
              }

              // Process the password reset form submission
              if (isset($_POST['submit'])) {
                $token = $_POST['token'];
                $password = $_POST['password'];
                $confirmPassword = $_POST['confirm_password'];

                // Validate the password and confirm password
                if ($password === $confirmPassword) {
                  // Hash the new password
                  $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

                  // Update the user's password in the database
                  $stmt = mysqli_prepare($conn, "UPDATE `users` SET password = ?, reset_token = NULL, reset_token_expiration = NULL WHERE reset_token = ?");
                  mysqli_stmt_bind_param($stmt, "ss", $hashedPassword, $token);
                  mysqli_stmt_execute($stmt);

                  // Display a success message to the user
                  echo '<div class="alert alert-success">Réinitialisation du mot de passe réussie. Tu peux maintenant<a href="AAB1.php">login</a>connecter avec votre mot de passe</div>';
                } else {
                  // Display an error message if the passwords do not match
                  echo '<div class="alert alert-danger">Les mots des passe sont pas les meme</div>';
                }
              }
            ?>
          </div>
        </div>
      </div>
    </div>
  
  </div>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
