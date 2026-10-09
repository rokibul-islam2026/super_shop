<?php
include('db.php');

// লিঙ্ক থেকে প্রোডাক্টের ID ধরা
if(isset($_GET['id'])){
    $product_id = $_GET['id'];
    $result = mysqli_query($conn, "SELECT * FROM products WHERE id = $product_id");
    $product = mysqli_fetch_assoc($result);
}

// কাস্টমার অর্ডার সাবমিট করলে
if(isset($_POST['submit_order'])){
    $customer_name = $_POST['customer_name'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $quantity = $_POST['quantity'];
    $product_name = $product['name'];
    $total_price = $product['price'] * $quantity;

    // ডেটাবেজে অর্ডার সেভ করা
    $sql = "INSERT INTO orders (customer_name, phone, address, product_name, quantity, total_price) 
            VALUES ('$customer_name', '$phone', '$address', '$product_name', '$quantity', '$total_price')";
    
    if(mysqli_query($conn, $sql)){
        echo "<script>alert('আপনার অর্ডারটি সফলভাবে সম্পন্ন হয়েছে!'); window.location.href='dashboard.php';</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8">
    <title>অর্ডার করুন - Super Shop</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 20px; }
        .order-container { max-width: 400px; margin: auto; background: white; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        input, textarea { width: 100%; padding: 8px; margin: 8px 0; box-sizing: border-box; }
        button { background-color: #28a745; color: white; border: none; padding: 10px; width: 100%; cursor: pointer; border-radius: 4px; font-size: 16px; }
        button:hover { background-color: #218838; }
    </style>
</head>
<body>

<div class="order-container">
    <h2>অর্ডার করুন: <?php echo $product['name']; ?></h2>
    <p><strong>একক দাম:</strong> ৳<?php echo $product['price']; ?></p>

    <form action="" method="POST">
        <label>আপনার নাম:</label>
        <input type="text" name="customer_name" required>

        <label>ফোন নম্বর:</label>
        <input type="text" name="phone" required>

        <label>ডেলিভারি ঠিকানা:</label>
        <textarea name="address" rows="3" required></textarea>

        <label>পরিমাণ (Quantity):</label>
        <input type="number" name="quantity" value="1" min="1" required>

        <button type="submit" name="submit_order">অর্ডার কনফার্ম করুন</button>
    </form>
</div>

</body>
</html>