<?php
include 'profig.php';

$product_id = $_GET['id'] ?? '';

$sql = "SELECT name, description, price, image FROM prod WHERE id = ?";
$stmt = $pro->prepare($sql);
$stmt->bind_param("i", $product_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
    echo "<p>Product not found.</p>";
    exit;
}

$product = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $product['name']; ?></title>
    <link rel="stylesheet" href="product.css">
</head>
<body>
    <header>
        <h1><?php echo $product['name']; ?></h1>
    </header>
    <main>
        <section class="product">
            <img src="<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>">
            <h2><?php echo $product['name']; ?></h2>
            <p><?php echo $product['description']; ?></p>
            <p class="price">$<?php echo number_format($product['price'], 2); ?></p>
            <form action="order.php" method="POST">
                <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
                <label for="quantity">Quantity:</label>
                <input type="number" id="quantity" name="quantity" min="1" value="1">
                <button type="submit">Buy Now</button>
            </form>
        </section>
    </main>
    <footer>
    <p>&copy; 2024 Sport pour tout le monde. All rights reserved.</p>
    </footer>
</body>
</html>
