<?php    
require 'userreg1.php';

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="AA.css">

</head>
<body>
<style>
        body {
  background:  blur(10px);

  background: linear-gradient(178.6deg, rgb(232, 245, 253) 3.3%, rgb(252, 253, 255) 109.6%);     }
    </style>
    <style>
   
        
  .container {
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
    margin-bottom: 20px;
    margin-top: 20px;

  }

</style>
    <div class="container">
        <h2>Inscription</h2>
        <form method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="full_name">Nom et Prénom</label>
                <input type="text" id="full_name" name="full_name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="phone">Numéro de téléphone</label>
                <input type="text" id="number" name="number" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="profile_picture">Photo de profil</label>
                <input type="file" id="image" name="image" class="form-control" >
            </div>
            <div class="form-group">
                <label for="dropdown1">Wilaya</label>
                <select name="wilayas" id="wilayas" >
                    <option selected disabled>Wilayas</option>
                    <?php
                                         $conn = mysqli_connect('localhost', 'root', '', 'craft2');
                                         $sql = "SELECT code, name FROM `states`";
                                         $result = mysqli_query($conn, $sql);
                                         while ($row = mysqli_fetch_array($result)) {
                                             echo "<option value=$row[code]>$row[name]</option>";
                                         }
                                         ?>
                    </select>
                </div>
              <div class="form-group">
    <label for="dropdown2">Region</label>
    <input type="text" name="communes" id="communes" class="form-control">
</div>

                <button name="submit" value="submit" type="submit" class="submit-btn">S'inscrire</button>
                <p class="form-message">Vous êtes déjà inscrit ? <a href="AAB.php">Connectez-vous</a></p>
                </form>
                </div>
                
                </body>
                </html>
