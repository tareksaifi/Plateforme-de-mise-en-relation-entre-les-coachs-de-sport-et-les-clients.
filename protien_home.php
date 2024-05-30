<?php
include 'profig.php';

$sql = "SELECT id, name, price, image FROM prod";
$result = $pro->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Protein Store</title>
    <link rel="stylesheet" href="protine_home.css">
</head>
<body>
    <header>
        <h1>Protein Store</h1>
    </header>
    <main>
        <section class="products">
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo '<article class="product-item">';
                    echo '<a href="product.php?id=' . $row["id"] . '">';
                    echo '<img src="images/' . $row["image"] . '" alt="' . $row["name"] . '">';
                    echo '<h2>' . $row["name"] . '</h2>';
                    echo '<p>$' . number_format(floatval($row["price"]), 2) . '</p>';
                    echo '</a>';
                    echo '</article>';
                }
            } else {
                echo "<p>No results found.</p>";
            }
            $pro->close();
            ?>
        </section>
    </main>
    <footer>
    <p>&copy; 2024 Sport pour tout le monde. All rights reserved.</p>
    </footer>
</body>
</html>
