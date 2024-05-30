<?php
include 'profig.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve product information
    $product_id = $_POST['product_id'] ?? '';
    $quantity = intval($_POST['quantity']);

    $sql = "SELECT name, price FROM prod WHERE id = ?";
    $stmt = $pro->prepare($sql);
    $stmt->bind_param("i", $product_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 0) {
        echo "<p>Product not found.</p>";
        exit;
    }

    $product = $result->fetch_assoc();
    $total_price = $quantity * $product['price'];

    // Display order confirmation and form
    echo "<!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Order Confirmation</title>
        <link rel='stylesheet' href='order.css'>
    </head>
    <body>
        <header>
            <h1>Order Confirmation</h1>
        </header>
        <main>
            <section class='product'>
                <h2>Thank you for your purchase!</h2>
                <p>You have ordered $quantity unit(s) of {$product['name']}.</p>
                <p>Total Price: \${$total_price}</p>
                <form action='order_process.php' method='post'>
                    <input type='hidden' name='product_id' value='$product_id'>
                    <input type='hidden' name='quantity' value='$quantity'>
                    <label for='full_name'>Full Name:</label>
                    <input type='text' id='full_name' name='full_name' required>
                    <label for='email'>Email:</label>
                    <input type='email' id='email' name='email' required>
                    <label for='phone'>Phone Number:</label>
                    <input type='text' id='phone' name='phone' required>
                    <label for='address'>Address:</label>
                    <textarea id='address' name='address' required></textarea>
                    <button type='submit'>Confirm Order</button>
                </form>
            </section>
        </main>
        <footer style='padding-bottom:10%;'>
            <p>&copy; 2024 Sport pour totu le monde. All rights reserved.</p>
        </footer>
    </body>
    </html>";

    $stmt->close();
} else {
    header("Location: index.php");
    exit();
}
?>
