<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;700&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update</title>
    <link rel="stylesheet" href="protin.css">
</head>
<body>
    <?php
    include('profig.php');
    $ID = $_GET['id'];
    $up = mysqli_query($pro, "SELECT * FROM prod WHERE id=$ID");
    $data = mysqli_fetch_array($up);
    ?>
    <center>
        <div class="main">
            <form action="up.php" method="POST" enctype="multipart/form-data">
                <h2>تعديل المنتجات</h2>
                <input type="hidden" name="id" value='<?php echo $data['id']; ?>'>
                <br>
                <input type="text" name="name" placeholder="Nom du produit" value='<?php echo $data['name']; ?>'>
                <br>
                <input type="text" name="price" placeholder="Prix du produit" style="margin-top: 3%;" value='<?php echo $data['price']; ?>'>
                <br>
                <div style="margin-top: 3%;">
                    <input type="file" id="file" name="image" style='display:none'>
                    <label for="file">تحديث صورة المنتج</label>
                    <button name="update" type='submit'>تعديل المنتج</button>
                    <br><br>
                </div>
                <a href="products.php">Voir les produit disponible</a>
            </form>
        </div>
    </center>
</body>
</html>
