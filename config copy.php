<?php

$conn = mysqli_connect('localhost', 'root', '', 'craft2');

if (isset($_POST['id'])){
    $id=$_POST['id'];
    $sql = "SELECT * FROM communes WHERE id='$id'";

   $result = mysqli_query($conn, $sql);
   while ($row  = mysqli_fetch_array($result)){

    $id = $row['id'];
    $communes = $row['communes'];
    echo "<option value '$id'>$communes</option>";
   }
}

?>