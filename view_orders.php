<?php
include('db.php');
?>

<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8">
    <title>Customer Orders List</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; background-color: #f4f4f4; }
        .container { max-width: 1000px; margin: auto; background: white; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        table { width: 100%; border-collapse: collapse; margin-top: 15px; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: left; }
        th { background-color: #f2f2f2; }
        .btn-back { display: inline-block; padding: 8px 15px; background: #007bff; color: white; text-decoration: none; border-radius: 4px; margin-bottom: 15px; }
    </style>
</head>
<body>

<div class="container">
    <a href="dashboard.php" class="btn-back">⬅ Back to Dashboard</a>
    <h2>Customer Orders List</h2>

    <table>
        <tr>
            <th>Order ID</th>
            <th>Customer Name</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Product Name</th>
            <th>Quantity</th>
            <th>Total Price</th>
            <th>Order Date</th>
        </tr>

        <?php
        $order_query = mysqli_query($conn, "SELECT * FROM orders ORDER BY id DESC");
        
        if(mysqli_num_rows($order_query) > 0){
            while($order = mysqli_fetch_assoc($order_query)){
                echo "<tr>
                        <td>{$order['id']}</td>
                        <td>{$order['customer_name']}</td>
                        <td>{$order['phone']}</td>
                        <td>{$order['address']}</td>
                        <td>{$order['product_name']}</td>
                        <td>{$order['quantity']}</td>
                        <td>৳{$order['total_price']}</td>
                        <td>{$order['order_date']}</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='8' style='text-align:center;'>এখনো কোনো অর্ডার আসেনি।</td></tr>";
        }
        ?>
    </table>
</div>

</body>
</html>