<?php

include 'config.php';


if (isset($_POST['submit'])) {




    $name = mysqli_real_escape_string($conn, $_POST['full_name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $num = mysqli_real_escape_string($conn, $_POST['number']);
    $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
    $skill= mysqli_real_escape_string($conn, $_POST['skills']);
    $exp=  mysqli_real_escape_string($conn, $_POST['experience']);
    $exper=  mysqli_real_escape_string($conn, $_POST['exper']);
  
    $price=  mysqli_real_escape_string($conn, $_POST['price']);
    $img_name = $_FILES['image']['name'];
	$img_size = $_FILES['image']['size'];
	$tmp_name = $_FILES['image']['tmp_name'];
	$error = $_FILES['image']['error'];


   
   

    if (!preg_match('/^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/', $email)) {

        echo '<div id="error-message" style="display:none; color:red;">Invalid email format</div>';

    }
   
        $select = mysqli_query($conn, "SELECT * FROM `users` WHERE email='$email'") or die('error');
        if (mysqli_num_rows($select) > 0) {
            echo '<div id="error-message" style="display:none; color:red;">Invalid email format</div>';
        } 
        else if(empty($name) || empty($email) || empty($num) || empty($pass) || empty($skill) || empty($exp) || empty($exper) ||  empty($communes) || empty($price)) {
            echo '<div id="error-message" style="display:none; color:red;">Tous les case sont require</div>';          
        }
         else {
            $pass = password_hash($pass, PASSWORD_DEFAULT);
          
            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
			$img_ex_lc = strtolower($img_ex);

			$allowed_exs = array("jpg", "jpeg", "png"); 
            if (in_array($img_ex_lc, $allowed_exs)) {
                $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
				$img_upload_path = 'uploads/'.$new_img_name;
				move_uploaded_file($tmp_name, $img_upload_path);


           
            $insert = mysqli_query($conn, "INSERT INTO `users`(full_name, email, number, password,skills,experience,exper,communes,price,pp) VALUES('$name', '$email','$num', '$pass','$skill','$exp','$exper','$communes','$price','$new_img_name')")
            or die('query failed'.mysqli_error($conn));
           
            }
            

        }
    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
    
    
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.1.1/crypto-js.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="employer reg.css">
    <title>Employer inscription</title>
    

</head>
<body>
<section class="side" ></section>
    
<section class="main"
style="    margin-left: -70%;">
    <div class="login-container">
        <p class="title">Inscription</p>
        <div class="separator"></div>
    <p class="welcome message">Entrer votre identifiants  pour inscription continuer
        et accédez à tous nos services</p>
  
        <form class="login-form"  method="post"  enctype="multipart/form-data">
           
        <?php
            if(isset($message)){
                foreach($message as $message){
                    echo '<div class"message">'.$message.'</div>';
                }
            }
            ?>
            <div class="form-control">
                <input type="text" id="full_name" name="full_name" minlength="5" placeholder="Nom et Prenom" required>
                <i class="fas fa-user"></i>
            </div>
            <div class="form-control">
                <input type="email" id="email" name="email" placeholder="Email" required>
                <i class="fa-solid fa-at"></i>
            </div>
            <div class="form-control">
                <input type="text" id="number" name="number" pattern="(07|06|05)[0-9]{8}"
 minlength="10" placeholder="Numero de telephone" required>
                <i class="fa-solid fa-phone"></i>
            </div>
            <div class="form-control">
                <input type="password" id="password" name="password" minlength="8" placeholder="Mot de pass" required>
               
                <i class="fas fa-lock"></i>
                
            </div>
            <label for="profile_picture">
            <div class="form-control">
                <input type="file" name="image" id="image" required placeholder="Photo de profile" >
                
                <i class="fa-regular fa-id-badge"></i>
             
            </div>
            </label>

            <div class="page-header"></div>    
<h3 class="h3style"> Détails professionel </h3> 


<div class="form-group"> 
    <label for="experience" class="control-label col-sm-4"> Experience:</label>
        <div class="col-sm-4">
            <select name="exper" class="form-control" id="exper" required>
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
    
        
    
    

             

    
    
  

       
</div>
<div class="form-group"> 
    <label class="control-label col-sm-4" for="skills"> Compétences:</label>
        <div class="col-sm-4"><input type="text"style="width:150%"  name="skills" required placeholder="Skills" class="form-control" name="skills" id="skills"
                                     required onblur="validate('text','skillerror',this.value)">
        </div>
        <label id="skillerror" class="error"></label>
</div>
<div class="input-group mb-3">

  <input type="number" class="form-control"  style="width:35%;maring-left:-70%" required placeholder="Prix" aria-label="price" name="price" id="price" aria-describedby="basic-addon2">
  <span class="input-group-text" style="width:70%;height:50%" id="basic-addon2">DZD/Heure</span>
</div>
<div class="page-header"></div>    
<h3 class="h3style">Domaine </h3> 


<div class="form-group"> 

        <div class="col-sm-4">
            <select name="experience" style="width:250%" class="form-control" id="experience" required>
            <option value="" label="Select" selected disabled >Select</option>
                
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
                <option >Paintre</option>
                <option >Menuisier</option>
                <option >Soudeur</option>
                <option >Maçon</option>
                <option>Menuisier aluminium </option>
                <option >Verrier</option>
                <option >Chef cuisinier</option>
         </select>
    </div>
</div>


            <button class="submit" name="submit" value="submit" type="submit">S’inscrire</button>
            <a class="connection" href="employer login.html">Vous êtes déjà inscrit ?</a>
        </form>
    </div>
</section>



</body>


</html>