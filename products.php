<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;700&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>products</title>
    <style>
        h3 {
            font-family: 'Cairo', sans-serif;
            text-align: center;
            color: #333;
            margin-bottom: 20px;
            font-weight: bold;
        }
        .card{
            float: right;
            margin-top: 20px;
            margin-left: 10px;
            margin-right: 10px;
        }
        .card img{
            width: 100%;
            height: 200px;
        }
        main{
            width: 60%;
        }
    </style>
</head>
<body>
    <center>
        <h3> جميع المنتجات </h3>
    </center>
    <?php
    include('profig.php');
    $result = mysqli_query($pro, "SELECT * FROM prod");
    while($riw = mysqli_fetch_array($result)) {
        echo "
        <center>
            <main>
                <div class='card' style='width: 15rem;'>
                    <img src='$riw[image]' class='card-img-top'>
                    <div class='card-body'>
                        <h5 class='card-title'>$riw[name]</h5>
                        <p class='card-text'>$riw[price]</p>
                        <a href='#' class='btn btn-danger'>حدف المنتج</a>
                        <a href='#' class='btn btn-primary'>تعديل المنتج</a>
                    </div>
                </div>
            </main>
        </center>
        ";
    }
    ?>
</body>
</html>
