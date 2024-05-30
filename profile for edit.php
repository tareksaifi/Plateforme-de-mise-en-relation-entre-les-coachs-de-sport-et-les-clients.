<?php

require 'userlogin1.php';
require 'user update info.php';

if ($_SESSION['logged_in'] == false) {
    header('Location: AAB.php');
}
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profile Modification</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body style="min-height:90vh;">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="content7 copy.php">
                    <style>
                        .logo {
                            font-family: Arial, sans-serif;
                            font-size: 24px;
                            font-weight: bold;
                            color: #007bff; /* Blue color */
                        }

                        .mano {
                            color: #000; /* Black color */
                        }

                        .pro {
                            color: #007bff; /* Blue color */
                        }
                    </style>
                    <nav class="navbar">
                        <div class="logo">
                            <span class="mano">Mano</span><span class="pro">Pro</span>
                        </div>
                    </nav>
                </a>

            </div>
        </nav>
        <main class="py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-4">
                        <h4 class="pb-2">
                            Profile Information
                        </h4>
                        <span class="text-justify mb-3" style="padding-top:-3px;"><br><br></span>
                    </div>
                    <div class="col-lg-8 text-center pt-2">
                    <?php
                            if (isset($_SESSION['display_alert']) && $_SESSION['display_alert']) {
                                echo '<div class="alert alert-success" role="alert">
                                        User information updated successfully.
                                    </div>';
                                $_SESSION['display_alert'] = false;
                            }
                            ?>
                        <div class="card py-4 mb-5 mt-md-3 bg-white rounded "
                            style="box-shadow: 0 1rem 3rem rgba(0, 0, 0, 0.175)">

                           

                            <form method="POST">
                                <div class="form-group px-3">

                                    <label for="displayName" class="col-12 text-left pl-0">Nom</label>
                                    <input type="text" name="name" class="col-md-8 form-control"
                                        placeholder="Jane Doe">

                                    <label for="email" class="pt-3 col-12 text-left pl-0">Email</label>
                                    <input type="email" name="email" class="col-md-8 form-control"
                                        placeholder="name@example.com">
                                </div>
                                <div class="form-group row mb-0 mr-4">
                                    <div class="col-md-8 offset-md-4 text-right">
                                        <button type="submit" class="btn btn-primary">Sauvegarder</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="border-bottom border-grey"></div>
                <div class="row justify-content-center pt-5">
                    <div class="col-lg-4">
                        <h4 class="pb-2">
                            Modifier votre mot de passe
                        </h4>
                        <span class="text-justify" style="padding-top:-3px;"></span>
                    </div>
                    <div class="col-lg-8 text-center pt-2">
                        <div class="card py-4 mb-5 mt-md-3 bg-white rounded"
                            style="box-shadow: 0 1rem 3rem rgba(0, 0, 0, 0.175)">

                            <form method="POST">
                                <div class="form-group px-3">

                                    <label for="password" class="col-12 text-left pl-0">Nouveau mot de
                                        passe</label>
                                    <input type="password" name="password" class="col-md-8 form-control"
                                        placeholder="Password">

                                    <label for="password" class="pt-3 col-12 text-left pl-0">Confirmer mot de
                                        passe</label>
                                    <input type="password" name="password1" class="col-md-8 form-control"
                                        placeholder="Password">

                                </div>
                                <div class="form-group row mb-0 mr-4">
                                    <div class="col-md-8 offset-md-4 text-right">
                                        <button type="submit" class="btn btn-primary">Sauvegarder</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="border-bottom border-grey"></div>
                <div class="row justify-content-center pt-5">
                    <div class="col-lg-4">
                        <h4 class="pb-2">
                            Supprimer mon compte
                        </h4>
                        <span class="text-justify" style="padding-top:-3px;"></span>
                    </div>
                    <div class="col-lg-8 pt-0">
                        <div class="card py-4 mb-5 mt-md-3 bg-white rounded"
                            style="box-shadow: 0 1rem 3rem rgba(0, 0, 0, 0.175)">
                            <div class="text-left px-3">
                                Si vous cliquez sur le bouton votre compte sera supprimé
                            </div>

                            <form method="POST">
                                <div class="form-group row mb-0 mr-4 pt-4 px-3">
                                    <div class="col-md-8 offset-l-4 text-left">
                                        <button type="submit" class="btn btn-danger pl-3" name="delete_account">Supprimer mon
                                            compte</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
    crossorigin="anonymous"></script>
