<?php session_start();
  if (isset($_POST['submit1'])) {
  session_destroy();
header('Location: AAB.php');

exit;

}
  //if (!isset($_SESSION['username'])) {
    

  //  header('Location: user login1.php'); // redirect the user to the login page if not logged in
//}
  
  
  ?>
<!DOCTYPE html>
<html>
<head>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<link rel="stylesheet" href="content7.css">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- Bootstrap Icons CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-xS30JIcQ0cyHFrVwY9IKMoM1Ug3bJkzzJXojPPlxBG3ovk3YnBN12RGWw3C9iW2H" crossorigin="anonymous"></script>
  <title>ManoPro</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
</head>
<style>
   
  </style>
</head>

<body>
<style>
    .logo {
      font-family: Arial, sans-serif;
      font-size: 24px;
      font-weight: bold;
      color: #007bff; /* Blue color */
      margin-left: 5%;
    }

    .mano {
      color: #000; /* Black color */
    }

    .pro {
      color: #007bff; /* Blue color */
    }
  </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <a class="navbar-brand logo" href="#">
        <span class="mano">Mano</span><span class="pro">Pro</span>
      </a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
<style></style>
          <a class="nav-link" href="mailto:manopro.service@gmail.com">Contact</a>

      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
          <a class="nav-link" href="mailto:manopro.service@gmail.com">Contact</a>

          </li>
          <?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}          if (isset($_SESSION['type']) && $_SESSION['type'] == "employer") {
              echo '<li class="nav-item"><a class="nav-link" href="profile_for edit employer.php">Profile</a></li>';
              echo '<li class="nav-item"><a class="nav-link" href="logout.php">Déconnexion</a></li>';
          } elseif (isset($_SESSION['type']) && $_SESSION['type'] == "user") {
              echo '<li class="nav-item"><a class="nav-link" href="profile for edit.php">Profile</a></li>';
              echo '<li class="nav-item"><a class="nav-link" href="logout.php">Déconnexion</a></li>';
          } else {
              echo '<li class="nav-item"><a class="nav-link" href="AAB.php">Connexion</a></li>';
          }
          ?>
        </ul>
      </div>
    </div>
  </nav>


<section class="ads-section shadow">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <ol class="carousel-indicators">
              <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"></li>
              <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></li>
              <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"></li>
            </ol>
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <a href="">
                <img src="images\hjfjvnd.jpg" class="d-block w-100" alt="Ad 1">
            </a>
        </div>
        <div class="carousel-item">
            <a href="protin.php">
                <img src="images/whey and creatine and chikar.jpg" class="d-block w-100" alt="Ad 2">
            </a>
        </div>
        <div class="carousel-item">
            <a href="food.html">
                <img src="images/food.jpg" class="d-block w-100" alt="Ad 3">
            </a>
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </a>
</div>

        </div>
      </div>
    </div>
  </section>

  
<section style="    margin-top: 1%;
    background-color:#F5F6F7;

" class="filter-bar">
  <div class="container">
    <div class="row">
    <form method="POST">

      <div class="col-md-3 col-sm-6 mb-3">
        <select class="form-select" name="categorie">
          <option value="" label="Select" selected disabled >Categorie</option>
                
                <option >Transport et chauffeurs</option>
                <option >Agents polyvalents</option>
                <option >Mécanicien</option>
                <option >Industrie & Production</option>
                <option >Bureautique & Secretariat</option>
                <option >Commerce & Vente</option>
                <option >Agents polyvalents</option>
                <option>Eléctronique & Téchnique</option>
                <option >Securité</option>
                <option >Electricien auto</option>
                <option >Electricien batiment</option>
                <option >Plombier</option>
                <option >Paintre</option>
                <option >Menuisier</option>
                <option >Soudeur</option>
                <option >Maçon</option>
                <option>Menuisier aluminium </option>
                <option >Verrier</option>
                <option >Chef cuisinier</option>
        </select>
      </div>
     
      <div class="col-md-3 col-sm-6 mb-3">
        <select class="form-select" name="experience">
          <option selected>Experience</option>
          <option value="1">1 an</option>
<option value="2">2 ans</option>
<option value="3">3 ans</option>
<option value="4">4 ans</option>
<option value="5">5 ans</option>
<option value="6">6 ans</option>
<option value="7">7 ans</option>
<option value="8">8 ans</option>
<option value="9+">9 ans et plus</option>
        </select>
      </div>
      <div class="col-md-3 col-sm-6 mb-3">
        <div class="range-slider">
          
          <div class="col-md-4 col-sm-6 form-group">
  <label for="price">Price:</label>
 <input type="range" class="form-range"id="price" name="price" min="0" max="10000" step="500">
  <span id="price-value"></span>
</div>
    
<script>
  const priceInput = document.getElementById('price');
  const priceValue = document.getElementById('price-value');
  
  // update the price value span whenever the range input value changes
  priceInput.addEventListener('input', () => {
    priceValue.textContent = `DZD ${priceInput.value}`;
    
  });
</script>
        </div>
      </div>
    </div>
  </div>
  <button class="blue-button" type="submit">Recherche</button>
</form>
</section>




<div class="container">
    <?php
    include 'config.php';
    $usersQuery = mysqli_query($conn, "SELECT * FROM users") or die('Query failedsqdsdsd');

    
    
    ?>


<div  style="
  
    margin-top: 4%;
   
" class="card-container">
<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Récupérez les valeurs des champs du formulaire
  $categorie = isset($_POST['categorie']) ? $_POST['categorie'] : '';
  $experience = $_POST['experience'];
  $price = $_POST['price'];

  // Faites quelque chose avec les valeurs récupérées, par exemple, effectuez une requête SQL pour filtrer les données en fonction des critères sélectionnés

  // Exemple de requête SQL
  $conn = mysqli_connect('localhost', 'root', '', 'craft2');
  $sql = "SELECT * FROM `users` WHERE verify_status='1'";

  if (!empty($categorie)) {
    $sql .= " AND experience = '$categorie'";
  }

  
  if (!empty($experience)) {
    $sql .= " AND exper >= $experience";
  }

  if (!empty($price)) {
    $sql .= " AND price <= $price";
  }

  $result = mysqli_query($conn, $sql);

  if (!$result) {
    die("Erreur lors de l'exécution de la requête: " . mysqli_error($conn));
  }
  while ($row = mysqli_fetch_assoc($result)) {
  $fullName = $row['full_name'];
  $jobTitle = $row['experience'];
  $description = $row['skills'];
  $profilePicture = $row['pp']; // Assuming the column name is 'profile_picture'
  $coverPicture = $row['pp']; // Assuming the column name is 'cover_picture'
  $phoneNumber = $row['number']; // Assuming the column name is 'phone_number'

  echo '<div style="margin-left:0.3%;margin-top:0.3%" class="card">';
  echo '<div class="cover-image">';
  echo '<img src="uploads/' . $coverPicture . '" alt="Cover Image">';
  echo '<div class="user-image">';
  echo '<img src="uploads/' . $profilePicture . '" alt="User Image">';
  echo '</div>';
  echo '</div>';

  echo '<div class="content">';
  echo '<h3 class="name">' . $fullName . '</h3>';
  echo '<p class="username">@Jackson</p>';

  echo '<p class="details">';
  echo $description;
  echo '</p>';

  echo '<a  href ="profile2.php?id='.$row['id'].'" class="effect effect-4" href="#">';
  echo 'Profil';
  echo '</a>';
  
  
  echo '<a class="call-link" href="tel:' . $phoneNumber . '">';
  echo 'Appeler';
  echo '</a>';

  echo '</div>';
  echo '</div>';}} else {
  // Handle the case where no filters are submitted
  $usersQuery = mysqli_query($conn, "SELECT * FROM users WHERE verify_status='1'") or die('Query failed');

  while ($row = mysqli_fetch_assoc($usersQuery)) {
    // Rest of your code to display all users
    $fullName = $row['full_name'];
    $jobTitle = $row['experience'];
    $description = $row['skills'];
    $profilePicture = $row['pp']; // Assuming the column name is 'profile_picture'
    $coverPicture = $row['pp']; // Assuming the column name is 'cover_picture'
    $phoneNumber = $row['number']; // Assuming the column name is 'phone_number'

    echo '<div style="margin-left:0.3%;margin-top:0.3%" class="card">';
    echo '<div class="cover-image">';
    echo '<img src="uploads/' . $coverPicture . '" alt="Cover Image">';
    echo '<div class="user-image">';
    echo '<img src="uploads/' . $profilePicture . '" alt="User Image">';
    echo '</div>';
    echo '</div>';

    echo '<div class="content">';
    echo '<h3 class="name">' . $fullName . '</h3>';
    echo '<p class="username">@Jackson</p>';

    echo '<p class="details">';
    echo $description;
    echo '</p>';

    echo '<a  href ="profile2.php?id='.$row['id'].'" class="effect effect-4" href="#">';
    echo 'Profil';
    echo '</a>';
    
    
    echo '<a class="call-link" href="tel:' . $phoneNumber . '">';
    echo 'Appeler';
    echo '</a>';

    echo '</div>';
    echo '</div>';
  }
}
?>

</div>

</div>

</div>

</div>

</div>

</div>


<script src="https://kit.fontawesome.com/704ff50790.js"
        crossorigin="anonymous">
    </script>

</body>
<style></style>

<footer class="bg-dark text-white py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <h5><div class="logo">
  <span class="mano">Mano</span><span class="pro">Pro</span>
</div></h5>
          <p>ManoPro est un startup algerien crée en 2023 consite a facileter la communication entre les technicien les travailleur manuels et les client pour des projet ou des taches speciale. </p>
        </div>
     
        <div class="col-md-4">
          <h5>Contact</h5>
          <ul class="list-unstyled">
            <li><i class="bi bi-geo-alt-fill"></i> Université Badji Mokhtar-Annaba
              <br>Faculté de Technologie
              <br> Département d'Informatique
              <br> BP.12, Annaba 23000
              Algerie
            </li>
            <li><i class="bi bi-envelope-fill"></i> ManoPro.service@gmail.com</li>
            <li><i class="bi bi-phone-fill"></i> Département d'Informatique</li>
          </ul>
        </div>
      </div>
      <div class="row mt-4">
        <div class="col text-center">
          <p>&copy;2023 ManoPro. Tous les droits sont réservés.</p>
        </div>
      </div>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/js/bootstrap.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</html>
