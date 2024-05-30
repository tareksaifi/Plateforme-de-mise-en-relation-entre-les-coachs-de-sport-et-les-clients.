<?php
include 'profig.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve order details from the form
    $product_id = $_POST['product_id'] ?? '';
    $quantity = intval($_POST['quantity']);
    $full_name = $_POST['full_name'] ?? '';
    $email = $_POST['email'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $address = $_POST['address'] ?? '';

    // Insert order into the database
    $sql = "INSERT INTO orders (product_id, quantity, full_name, email, phone, address) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $pro->prepare($sql);
    $stmt->bind_param("iissss", $product_id, $quantity, $full_name, $email, $phone, $address);
    
    if ($stmt->execute()) {
        // Order successfully saved
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
                    <p>Your order has been placed successfully.</p>
                </section>
            </main>
        <footer >
        <p>&copy; 2024 Sport pour tout le monde. All rights reserved.</p>
        </footer>
        </body>
        </html>";
    } else {
        // Error occurred while saving order
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
} else {
    // If request method is not POST, redirect to index page
    header("Location: index.php");
    exit();
}
?>
