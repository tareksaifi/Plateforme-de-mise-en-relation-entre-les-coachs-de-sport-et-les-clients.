<?php
include 'profig.php';

// Retrieve orders from the database
$sql = "SELECT * FROM orders";
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
                        <th>Product ID</th>
                        <th>Quantity</th>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Order Date</th>
                    </tr>
                </thead>
                <tbody>";
    
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>".$row["id"]."</td>
                <td>".$row["product_id"]."</td>
                <td>".$row["quantity"]."</td>
                <td>".$row["full_name"]."</td>
                <td>".$row["email"]."</td>
                <td>".$row["phone"]."</td>
                <td>".$row["address"]."</td>
                <td>".$row["order_date"]."</td>
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
