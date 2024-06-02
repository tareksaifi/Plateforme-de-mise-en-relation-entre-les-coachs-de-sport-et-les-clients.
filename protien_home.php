<!DOCTYPE html>
<html lang="en">
<head>
<?php
include 'profig.php';

$sql = "SELECT id, name, price, image FROM prod";
$result = $pro->query($sql);
?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <title>Protein Store</title>
    <link rel="stylesheet" href="protien_home.css">
</head>
<body>
   
    <main>
        <section class="main-content">
            <div class="slogan">
                <h1>Discover Delicious Protein Products</h1>
                <p>Explore our wide range of appetizing protein items</p>
            </div>
            <div style="padding-left:19%" class="search-container">
                <input type="text" id="searchInput" placeholder="Search for your favorite product...">
                <button type="button" onclick="search()">Search</button>
            </div>
        </section>
        <section class="products container">
            <?php
            if ($result && $result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo '<article class="product-item">';
                    echo '<a href="product.php?id=' . $row["id"] . '">';
                    echo '<img src="' . $row["image"] . '" alt="' . $row["name"] . '">';
                    echo '<h2>' . $row["name"] . '</h2>';
                    echo '<p>' . number_format(floatval($row["price"]), 2) . ' DZD</p>';
                    echo '</a>';
                    echo '</article>';
                }
            } else {
                echo "<p>No results found.</p>";
            }
            if ($pro) {
                $pro->close();
            }
            ?>
        </section>
    </main>
    <div class="footer">
        <div class="container-footer">
            <div class="row-footer">
                
                <div class="footer-col">
                    <h4>Nous services</h4>
                    <ul>
                        <li><a href="food.html">Info de nourriture</a></li>
                        <li><a href="content7 copy.php">Reserver un coach</a></li>
                        
                    </ul>
                </div>
               
                <div style="margin-left: 40%;" class="footer-col">
                    <h4>Réseaux sociaux</h4>
                    <div class="social-link">
                        <a href=""><i class="fab fa-facebook-f"></i></a>
                        <a href="https://web.telegram.org/k/"><i class="fab fa-telegram"></i></a>
                        <a href=""><i class="fab fa-twitter"></i></a>
                        <a href=""><i class="fab fa-whatsapp"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function search() {
            var input, filter, articles, article, title, i, txtValue;
            input = document.getElementById('searchInput');
            filter = input.value.toUpperCase();
            articles = document.getElementsByClassName('product-item');

            for (i = 0; i < articles.length; i++) {
                article = articles[i];
                title = article.getElementsByTagName('h2')[0];
                txtValue = title.textContent || title.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    article.style.display = "";
                } else {
                    article.style.display = "none";
                }
            }
        }
    </script>
</body>
</html>
