
  <?php session_start();
  if (isset($_POST['submit1'])) {
  session_destroy();
header('Location: login.php');
exit;}
  if (!isset($_SESSION['username'])) {
    

    header('Location: user login1.php'); // redirect the user to the login page if not logged in
}
  
  
  ?>
   


 <html lang="en">


    <!-- Font Awesome -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
  rel="stylesheet"
/>
<!-- Google Fonts -->
<link
  href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
  rel="stylesheet"
/>
<!-- MDB -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.css"
  rel="stylesheet"
/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="style - Copy2.1.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- MDB -->
<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.js"
></script>
<link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
<title>Accueil</title>
<head></head><body>
<!--Main Navigation-->
<header>
 

  <!-- Navbar -->
  <nav id="main-navbar" class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
    <!-- Container wrapper -->
    <div class="container-fluid">
      <!-- Toggler -->
      <button data-mdb-toggle="sidenav" data-mdb-target="#sidenav-1" class="btn shadow-0 p-0 me-3 d-block d-xxl-none"
        aria-controls="#sidenav-1" aria-haspopup="true">
        <i class="fas fa-bars fa-lg"></i>
      </button>

      <!-- Search form -->
      <form class="d-none d-md-flex input-group w-auto my-auto" >
        <input autocomplete="off" type="search" class="form-control rounded"
          placeholder='Search (ctrl + "/" to focus)' style="min-width: 225px" />
        <span class="input-group-text border-0"><i class="fas fa-search"></i></span>
      </form>

      <!-- Right links -->
      <ul class="navbar-nav ms-auto d-flex flex-row">
        <!-- Notification dropdown -->
        <li class="nav-item dropdown">
          <a class="nav-link me-3 me-lg-0 dropdown-toggle hidden-arrow" href="#" id="navbarDropdownMenuLink"
            role="button" data-mdb-toggle="dropdown" aria-expanded="false">
            <i class="fas fa-bell"></i>
            <span class="badge rounded-pill badge-notification bg-danger">1</span>
          </a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="#">Some news</a></li>
            <li><a class="dropdown-item" href="#">Another news</a></li>
            <li>
              <a class="dropdown-item" href="#">Something else here</a>
            </li>
          </ul>
        </li>

        <!-- Icon -->
        <li class="nav-item">
          <a class="nav-link me-3 me-lg-0" href="#">
            <i class="fas fa-fill-drip"></i>
          </a>
        </li>
        <!-- Icon -->
        <li class="nav-item me-3 me-lg-0">
          <a class="nav-link" href="#">
            <i class="fab fa-github"></i>
          </a>
        </li>

        <!-- Icon dropdown -->
        <li class="nav-item dropdown">
          <a class="nav-link me-3 me-lg-0 dropdown-toggle hidden-arrow" href="#" id="navbarDropdown" role="button"
            data-mdb-toggle="dropdown" aria-expanded="false">
            <i class="united kingdom flag m-0"></i>
          </a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
            <li>
              <a class="dropdown-item" href="#"><i class="united kingdom flag"></i>English
                <i class="fa fa-check text-success ms-2"></i></a>
            </li>
            <li>
              <hr class="dropdown-divider" />
            </li>
            <li>
              <a class="dropdown-item" href="#"><i class="poland flag"></i>Polski</a>
            </li>
            <li>
              <a class="dropdown-item" href="#"><i class="china flag"></i>中文</a>
            </li>
            <li>
              <a class="dropdown-item" href="#"><i class="japan flag"></i>日本語</a>
            </li>
            <li>
              <a class="dropdown-item" href="#"><i class="germany flag"></i>Deutsch</a>
            </li>
            <li>
              <a class="dropdown-item" href="#"><i class="france flag"></i>Français</a>
            </li>
            <li>
              <a class="dropdown-item" href="#"><i class="spain flag"></i>Español</a>
            </li>
            <li>
              <a class="dropdown-item" href="#"><i class="russia flag"></i>Русский</a>
            </li>
            <li>
              <a class="dropdown-item" href="#"><i class="portugal flag"></i>Português</a>
            </li>
          </ul>
        </li>

        <!-- Avatar -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle hidden-arrow d-flex align-items-center" href="#"
            id="navbarDropdownMenuLink" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
            <img src="https://mdbootstrap.com/img/Photos/Avatars/img (31).jpg" class="rounded-circle" height="22"
              alt="" loading="lazy" />
          </a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="#">My profile</a></li>
            <li><a class="dropdown-item" href="#">Settings</a></li>
            <li><a class="dropdown-item" href="#">Logout</a></li>
          </ul>
        </li>
      </ul>
    </div>
    <!-- Container wrapper -->
  </nav>
  <!-- Navbar -->
</header>
<!--Main Navigation-->
<script>const sidenav = document.getElementById("sidenav-1");
const instance = mdb.Sidenav.getInstance(sidenav);

let innerWidth = null;

const setMode = (e) => {
  // Check necessary for Android devices
  if (window.innerWidth === innerWidth) {
    return;
  }

  innerWidth = window.innerWidth;

  if (window.innerWidth < 1400) {
    instance.changeMode("over");
    instance.hide();
  } else {
    instance.changeMode("side");
    instance.show();
  }
};

setMode();

// Event listeners
window.addEventListener("resize", setMode);</script>
<?php //echo var_dump($_SESSION);?>

<?php
    
include 'config.php';
    if(isset($_GET['submit'])){
       
     //  $search = mysqli_real_escape_string($conn, $_POST['search']);
       $searchs = $_GET["search"];
       $sql = "SELECT * FROM users WHERE full_name LIKE '%$searchs%' OR  experience LIKE '%$searchs%' OR exper LIKE '%$searchs%' ";
       $result = mysqli_query($conn, $sql);
       $queryResults = mysqli_num_rows($result);
    
                       if ($queryResults >0){
        while ($row = mysqli_fetch_assoc($result)){
          $id=  $row['id'];
             echo "  <div style=\"padding-left: 15%;padding-top:5%;padding-right:15%; top: 50%;
             left: 50%;\" class=\"row\">
             <div class=\"col-lg-4 col-md-6 mb-4\">
               <div class=\"card\">
                 <div class=\"bg-image hover-overlay ripple\" data-mdb-ripple-color=\"light\">
                   <img src=\"uploads/".$row['pp']."\" class=\"img-fluid\" />
                   <a href=\"#\">
                     <div class=\"mask\" style=\"background-color: rgba(251, 251, 251, 0.15);\"></div>
                   </a>
                 </div>
                 
                <div class=\"card-body\">
                   <h5 class=\"card-title\"><a href ='profile.php?id=".$row['id']."' >".$row['full_name']."</h5>
                   <p class=\"card-text\">
                   <h6 class=\"card-subtitle mb-2 text-muted\">".$row['experience']."</h6>
                   <h6 class=\"card-subtitle mb-2 text-muted\">".$row['price']." DZD/H</h6>
                        <h6 class=\"card-subtitle mb-2 text-muted\">Experience : ".$row['exper']." ans</h6>
                        <p class=\"card-text\"><i class=\"bi bi-geo-alt\"></i> ".$row['communes'].", ".$row['wilaya']." </p>
                   </p>
                   </p>
                   <a href=\"#\" class=\"btn btn-primary\">Read</a>
                 </div>
               </div>
             </div>";$queryResults=$queryResults-1; 
               
             $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
       
            if ($queryResults >0){
             echo " 
             <div class=\"col-lg-4 col-md-6 mb-4\">
               <div class=\"card\">
                 <div class=\"bg-image hover-overlay ripple\" data-mdb-ripple-color=\"light\">
                   <img src=\"uploads/".$row['pp']."\" class=\"img-fluid\" />
                   <a href=\"#\">
                     <div class=\"mask\" style=\"background-color: rgba(251, 251, 251, 0.15);\"></div>
                   </a>
                 </div> 
       
               
                   
                 <div class=\"card-body\">
                   <h5 class=\"card-title\"><a href ='profile.php?id=".$row['id']."' >".$row['full_name']."</h5>
                   <p class=\"card-text\">
                   <h6 class=\"card-subtitle mb-2 text-muted\">".$row['experience']."</h6>
                   <h6 class=\"card-subtitle mb-2 text-muted\">".$row['price']." DZD/H</h6>
                        <h6 class=\"card-subtitle mb-2 text-muted\">Experience : ".$row['exper']." ans</h6>
                        <p class=\"card-text\"><i class=\"bi bi-geo-alt\"></i> ".$row['communes'].", ".$row['wilaya']." </p>
                   </p>
                   </p>
                   <a href=\"#\" class=\"btn btn-primary\">Read</a>
                 </div>
               </div>
             </div>"; }$queryResults=$queryResults-1; 
             $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
             if ($queryResults >0){echo " 
             <div class=\"col-lg-4 col-md-6 mb-4\">
               <div class=\"card\">
                 <div class=\"bg-image hover-overlay ripple\" data-mdb-ripple-color=\"light\">
                   <img src=\"uploads/".$row['pp']."\" class=\"img-fluid\" />
                   <a href=\"#\">
                     <div class=\"mask\" style=\"background-color: rgba(251, 251, 251, 0.15);\"></div>
                   </a>
                 </div>
                
                   
                 <div class=\"card-body\">
                   <h5 class=\"card-title\"><a href ='profile.php?id=".$row['id']."' >".$row['full_name']."</h5>
                   <p class=\"card-text\">
                   <h6 class=\"card-subtitle mb-2 text-muted\">".$row['experience']."</h6>
                   <h6 class=\"card-subtitle mb-2 text-muted\">".$row['price']." DZD/H</h6>
                        <h6 class=\"card-subtitle mb-2 text-muted\">Experience : ".$row['exper']." ans</h6>
                        <p class=\"card-text\"><i class=\"bi bi-geo-alt\"></i> ".$row['communes'].", ".$row['wilaya']." </p>
                   </p>
                   <a href=\"#\" class=\"btn btn-primary\">Read</a>
                 </div>
               </div>
             </div>
           </div>
            ";$queryResults=$queryResults-1; }
               ;
        }
       }
    



    }
    else{
   $sql = "SELECT * FROM users ";
   $result = mysqli_query($conn, $sql);
   $id="SELECT id FROM users LIMIT 3 OFFSET 0";
   $id1=mysqli_query($conn, $id);
   $queryResults = mysqli_num_rows($result);
   $queryResults1 = mysqli_num_rows($id1);

                   while ($queryResults >0){  $rows = array();
                   
                   
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

      $rows[] = $row;
      echo " <div style=\"padding-left: 15%;padding-top:5%;padding-right:15%; top: 50%;
      left: 50%;\" class=\"row\">
      <div class=\"col-lg-4 col-md-6 mb-4\">
        <div class=\"card\">
          <div class=\"bg-image hover-overlay ripple\" data-mdb-ripple-color=\"light\">
            <img src=\"uploads/".$row['pp']."\" class=\"img-fluid\" />
            <a href=\"#\">
              <div class=\"mask\" style=\"background-color: rgba(251, 251, 251, 0.15);\"></div>
            </a>
          </div>
          
         <div class=\"card-body\">
            <h5 class=\"card-title\"><a href ='profile.php?id=".$row['id']."' >".$row['full_name']."</h5>
            <p class=\"card-text\">
            <h6 class=\"card-subtitle mb-2 text-muted\">".$row['experience']."</h6>
            <h6 class=\"card-subtitle mb-2 text-muted\">".$row['price']." DZD/H</h6>
                 <h6 class=\"card-subtitle mb-2 text-muted\">Experience : ".$row['exper']." ans</h6>
                 <p class=\"card-text\"><i class=\"bi bi-geo-alt\"></i> ".$row['communes'].", ".$row['wilaya']." </p>
            </p>
            </p>
            <a href=\"#\" class=\"btn btn-primary\">Read</a>
          </div>
        </div>
      </div>";$queryResults=$queryResults-1; 
        
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

     if ($queryResults >0){
      echo " 
      <div class=\"col-lg-4 col-md-6 mb-4\">
        <div class=\"card\">
          <div class=\"bg-image hover-overlay ripple\" data-mdb-ripple-color=\"light\">
            <img src=\"uploads/".$row['pp']."\" class=\"img-fluid\" />
            <a href=\"#\">
              <div class=\"mask\" style=\"background-color: rgba(251, 251, 251, 0.15);\"></div>
            </a>
          </div> 

        
            
          <div class=\"card-body\">
            <h5 class=\"card-title\"><a href ='profile.php?id=".$row['id']."' >".$row['full_name']."</h5>
            <p class=\"card-text\">
            <h6 class=\"card-subtitle mb-2 text-muted\">".$row['experience']."</h6>
            <h6 class=\"card-subtitle mb-2 text-muted\">".$row['price']." DZD/H</h6>
                 <h6 class=\"card-subtitle mb-2 text-muted\">Experience : ".$row['exper']." ans</h6>
                 <p class=\"card-text\"><i class=\"bi bi-geo-alt\"></i> ".$row['communes'].", ".$row['wilaya']." </p>
            </p>
            </p>
            <a href=\"#\" class=\"btn btn-primary\">Read</a>
          </div>
        </div>
      </div>"; }$queryResults=$queryResults-1; 
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      if ($queryResults >0){echo " 
      <div class=\"col-lg-4 col-md-6 mb-4\">
        <div class=\"card\">
          <div class=\"bg-image hover-overlay ripple\" data-mdb-ripple-color=\"light\">
            <img src=\"uploads/".$row['pp']."\" class=\"img-fluid\" />
            <a href=\"#\">
              <div class=\"mask\" style=\"background-color: rgba(251, 251, 251, 0.15);\"></div>
            </a>
          </div>
         
            
          <div class=\"card-body\">
            <h5 class=\"card-title\"><a href ='profile.php?id=".$row['id']."' >".$row['full_name']."</h5>
            <p class=\"card-text\">
            <h6 class=\"card-subtitle mb-2 text-muted\">".$row['experience']."</h6>
            <h6 class=\"card-subtitle mb-2 text-muted\">".$row['price']." DZD/H</h6>
                 <h6 class=\"card-subtitle mb-2 text-muted\">Experience : ".$row['exper']." ans</h6>
                 <p class=\"card-text\"><i class=\"bi bi-geo-alt\"></i> ".$row['communes'].", ".$row['wilaya']." </p>
            </p>
            <a href=\"#\" class=\"btn btn-primary\">Read</a>
          </div>
        </div>
      </div>
    </div>
     ";$queryResults=$queryResults-1; }
        
    

    }}
   

                   
    
?>

</body>

</html>

