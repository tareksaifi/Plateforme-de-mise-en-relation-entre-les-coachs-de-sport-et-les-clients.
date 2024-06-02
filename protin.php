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
    <style>
        body {
            font-family: 'Cairo', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
        }

        .side-menu {
            width: 250px;
            background-color: #333;
            color: #fff;
            position: fixed;
            height: 100%;
            padding-top: 20px;
        }

        .side-menu a {
            padding: 10px 15px;
            text-decoration: none;
            font-size: 18px;
            color: #fff;
            display: block;
        }

        .side-menu a:hover {
            background-color: #575757;
        }

        .main-content {
            margin-left: 250px;
            padding: 20px;
            width: 100%;
        }

        .main {
            max-width: 600px;
            margin: auto;
            padding: 20px;
            background: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .img {
            margin-bottom: 20px;
        }

        input[type="text"], input[type="file"] {
            width: 80%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        label {
            cursor: pointer;
            color: #4CAF50;
            text-decoration: underline;
        }

        a {
            color: #4CAF50;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="side-menu">
        <a href="content7 copy.php">Accueill</a>
        <a href="products.php">Produits</a>
        <a href="admin_orders.php">Commands</a>
        <a href="protien_home.php">Magasin</a>
    </div>
    
    <div class="main-content">
        <center>
            <div class="main">
                <form action="insert.php" method="post" enctype="multipart/form-data">
                    <h2>Ajouter un produit</h2>
                    <img class="img" src="images/R (1).png" alt="Product Image" width="250px">
                    <input type="text" name="name" placeholder="Nom du produit">
                    <br>
                    <input type="text" name="price" placeholder="Prix du produit" style="margin-top: 3%;">
                    <br>
                    <input type="text" name="description" placeholder="Description du produit" style="margin-top: 3%;">
                    <br>
                    <div style="margin-top: 3%;">
                        <input type="file" id="file" name="image" style="display:none">
                        <label for="file">Image du produit</label>
                        <button name="upload">Met le produit</button>
                        <br><br>
                    </div>
                    <a href="products.php">Voir les produit disponible</a>
                </form>
            </div>
        </center>
    </div>
</body>
</html>
