<?php
include 'profig.php';

// If the delete form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['order_id'])) {
    // Escape the order ID to prevent SQL injection
    $order_id = $pro->real_escape_string($_POST['order_id']);
    
    // Delete the order from the database
    $sql = "DELETE FROM orders WHERE id = '$order_id'";
    if ($pro->query($sql) === TRUE) {
    } else {
    }
}

// Retrieve orders from the database
$sql = "SELECT orders.id, prod.name AS product_name, orders.quantity, orders.full_name, orders.email, orders.phone, orders.address, orders.order_date
        FROM orders
        INNER JOIN prod ON orders.product_id = prod.id";
$result = $pro->query($sql);

if ($result->num_rows > 0) {
    // Display orders in a table
    echo "<!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Admin Orders</title>
        <link rel='stylesheet' href='admin_orders.css'>
    </head>
    <body>
        <header>
            <h1>Admin Orders</h1>
        </header>
        <main>
            <table>
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Order Date</th>
                        <th>Action</th> <!-- New column for the delete button -->
                    </tr>
                </thead>
                <tbody>";
    
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>".$row["id"]."</td>
                <td>".$row["product_name"]."</td>
                <td>".$row["quantity"]."</td>
                <td>".$row["full_name"]."</td>
                <td>".$row["email"]."</td>
                <td>".$row["phone"]."</td>
                <td>".$row["address"]."</td>
                <td>".$row["order_date"]."</td>
                <td> <!-- New column for the delete button -->
                    <form action='' method='post'>
                        <input type='hidden' name='order_id' value='".$row["id"]."'>
                        <button type='submit'>Delete</button>
                    </form>
                </td>
            </tr>";
    }
    
    echo "</tbody>
        </table>
    </main>
    <footer>
        <p>&copy; 2024 Protein Store. All rights reserved.</p>
    </footer>
</body>
</html>";
} else {
    echo "0 results";
}
$pro->close();
?>
