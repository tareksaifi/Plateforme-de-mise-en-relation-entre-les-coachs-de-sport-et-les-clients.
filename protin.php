<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;700&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>protinshoop</title>
    <link rel="stylesheet" href="protin.css">
</head>
<body>
    <center>
        <div class="main">
            
            <form action="insert.php" method="post" enctype="multipart/form-data">
                <h2></h2>
                <img class="img" src="images/R (1).png" alt="" width="250px" >
                <input type="text" name="name" placeholder="Nom du produit">
                <br>
                <input type="text" name="price" placeholder="Prix du produit "style="margin-top: 3%;">
                <br>
                <div style="margin-top: 3%;">
                <input type="file" id="file" name="image" style='display:none' >
                <label for="file">Image du produit</label>
                <button name="upload">Met le produit</button>
                <br><br></div>
                <a href="products.php">Voir les produit disponible</a>
            </form>
        </div>
       
    </center>
</body>
</html>
