<?php
include 'config.php';

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

background: radial-gradient(circle at 0.7% 1%, rgb(215, 248, 247) 0%, rgb(102, 188, 239) 100.2%);      }

    .container {
      margin-top: 50px;
    }

    .card {
      border: none;
      border-radius: 8px;
      box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1);
    }

    .card-header {
      background-color: blue; 
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
      background-color: blue; 
      border-color: blue; 
    }

    .btn-blue:hover { 
      background-color: darkblue;
      border-color: darkblue; 
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

                // Check if the token exists in the database
                $stmt = mysqli_prepare($conn, "SELECT * FROM `users2` WHERE reset_token = ?");
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
                        <label for="confirm_password">Confirmer mot de passe</label>
                        <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Confirm your new password" required>
                      </div>
                      <div class="text-center">
                        <button type="submit" name="submit" class="btn btn-blue btn-block">Realiser le mot de passe</button> 
                      </div>
                    </form>
                    <?php
                  } else {
                    echo '<div class="alert alert-danger">Invalid or expired token. Please try again.</div>';
                  }
                } else {
                  echo '<div class="alert alert-danger">Invalid or expired token. Please try again.</div>';
                }
              } else {
                header('Location: reset_password.php');
                exit;
              }

              // Process the password reset form submission
              if (isset($_POST['submit'])) {
                $token = $_POST['token'];
                $password = $_POST['password'];
                $confirmPassword = $_POST['confirm_password'];

                if ($password === $confirmPassword) {
                  // Hash the new password
                  $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

                  $stmt = mysqli_prepare($conn, "UPDATE `users2` SET password = ?, reset_token = NULL, reset_token_expiration = NULL WHERE reset_token = ?");
                  mysqli_stmt_bind_param($stmt, "ss", $hashedPassword, $token);
                  mysqli_stmt_execute($stmt);

                  echo '<div class="alert alert-success">Réinitialisation du mot de passe réussie. Tu peux maintenant<a href="AAB.php">login</a> conneter avec votre mot de passe.</div>';
                } else {
                  echo '<div class="alert alert-danger">Mots des passe sont pas les meme </div>';
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
