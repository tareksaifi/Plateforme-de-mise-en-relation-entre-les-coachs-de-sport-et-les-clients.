<?php    
require 'employerreg1.php';
$acctype=true;
$_SESSION['s1']=false;

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
  body  {
  background: linear-gradient(178.6deg, rgba(255, 229, 119, 0.1) 3.3%, rgba(253, 191, 88, 0.4) 109.6%);
}
  
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
<?php 

if (        $_SESSION['s1']
){
    if (mysqli_num_rows($select) > 0||mysqli_num_rows($select11) > 0) {
        echo '<div class="error-message" style="  background-color: #f8d7da;
        color: #721c24;
        padding: 10px;
        border: 1px solid #f5c6cb;
        border-radius: 5px;
        margin-bottom: 10px;">
        <p class="error-text">Phone number or email is already registered. Please choose a different one.</p>
      </div>
      ';
      } 
      else if (mysqli_num_rows($select1111) > 0||mysqli_num_rows($select111) > 0) {
        echo '<div class="error-message" style="  background-color: #f8d7da;
                   color: #721c24;
                   padding: 10px;
                   border: 1px solid #f5c6cb;
                   border-radius: 5px;
                   margin-bottom: 10px;">
                   <p class="error-text">Phone number or email is already registered. Please choose a different one.</p>
                 </div>
                 ';
    }
}

?>
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
    <label for="experience" class="control-label col-sm-4"> Experience:</label>
        <div class="col-sm-4">
            <select name="experience" class="form-control" id="experience" required>
                <option value=""selected disabled>Select </option>
                <option value="1">1 year </option>
                <option value="2">2 year </option>
                <option value="3">3 year </option>
                <option value="4">4 year </option>
                <option value="5">5 year </option>
                <option value="6">6 year </option>
                <option value="7">7 year </option>
                <option value="8">8 year </option>
                <option value="9+">9+ year </option>
         </select>
    </div>
</div>
<div class="form-group"> 
    <label class="control-label col-sm-4" for="skills"> Compétences:</label>
        <div class="col-sm-4"><input type="text"style="width:150%"  name="skills" required placeholder="Description" class="form-control" name="skills" id="skills"
                                     required onblur="validate('text','skillerror',this.value)">
        </div>
        <label id="skillerror" class="error"></label>
</div>
<div class="input-group mb-3">

  <input type="number" class="form-control"  style="width:35%" required placeholder="Prix" aria-label="price" name="price" id="price" aria-describedby="basic-addon2">
  <span class="input-group-text" style="width:70%;height:50%" id="basic-addon2">DZD/Heure</span>
</div>
<div class="page-header"></div>    





                <button name="submit" value="submit" type="submit" class="submit-btn">S'inscrire</button>
                <p class="form-message">Vous êtes déjà inscrit ? <a href="AAB1.php">Connectez-vous</a></p>
                </form>
                </div>
                <style>
        .submit-btn {
   
    font-family: 'Roboto', sans-serif;
    
    background-color: #f86d2d; /* Updated color to blue (#007bff) */
    color: #fff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s ease;
  }
  
       .submit-btn:hover {
    background-color: #cf6a2c; /* Updated hover color to a darker shade of blue */
  }
   </style>
                </body>
                
                </html>
