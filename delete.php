<?php
    include('profig.php');
    $ID = $_GET['id'];
    mysqli_query($pro, "DELETE FROM prod WHERE id=$ID");
    
    header('location: products.php');
    
    ?>