<?php
session_start();
include 'db.php';

// লগইন করা না থাকলে কাউকে ঢুকতে দেবে না (সুরক্ষা)
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

// লগআউট করার লজিক
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: index.php");
    exit();
}

// নতুন প্রোডাক্ট যোগ করার লজিক
if (isset($_POST['add_product'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $brand = $_POST['brand'];
    
    $image = $_FILES['image']['name'];
    $target = "images/" . basename($image);

    if (!empty($image)) {
        move_uploaded_file($_FILES['image']['tmp_name'], $target);
    } else {
        $image = 'default.jpg';
    }

    $sql = "INSERT INTO products (name, price, brand, image) VALUES ('$name', '$price', '$brand', '$image')";
    $conn->query($sql);
    header("Location: dashboard.php");
}

// প্রোডাক্ট ডিলিট করার লজিক
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $conn->query("DELETE FROM products WHERE id=$id");
    header("Location: dashboard.php");
}

// ডাটাবেজ থেকে সকল প্রোডাক্ট নিয়ে আসা
$result = $conn->query("SELECT * FROM products");
?>

<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - Product Management</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 20px; background-color: #f4f4f4; }
        .header { display: flex; justify-content: space-between; align-items: center; background: white; padding: 15px 30px; border-radius: 8px; margin-bottom: 20px; }
        .logout-btn { padding: 8px 15px; background: red; color: white; text-decoration: none; border-radius: 4px; font-weight: bold; }
        
        .product-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 20px; }
        .product-card { background: white; padding: 15px; border-radius: 8px; text-align: center; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
        .product-card img { width: 100%; height: 130px; object-fit: cover; border-radius: 4px; }
        .delete-btn { display: inline-block; margin-top: 10px; color: red; text-decoration: none; font-weight: bold; }
        
        .add-form { background: white; padding: 20px; margin-top: 40px; border-radius: 8px; max-width: 400px; }
        .add-form input { width: 90%; padding: 8px; margin: 5px 0; }
        .add-form button { padding: 10px 15px; background: green; color: white; border: none; border-radius: 4px; cursor: pointer; }
    </style>
</head>
<body>
<div class="header">
    <h2>Super Shop Product Management (Admin Dashboard)</h2>
    <div>
        <a href="view_orders.php" style="background-color: #17a2b8; color: white; padding: 8px 15px; text-decoration: none; border-radius: 4px; font-weight: bold; margin-right: 10px;">View Orders</a>
        <a href="dashboard.php?logout=true" class="logout-btn">Logout</a>
    </div>
</div>
   

    <!-- প্রোডাক্ট ডিসপ্লে সেকশন -->
    <h2>Product List</h2>
    <div class="product-grid">
        <?php while($row = $result->fetch_assoc()): ?>
            <div class="product-card">
                <img src="images/<?php echo $row['image']; ?>" alt="<?php echo $row['name']; ?>">
                <h3><?php echo $row['name']; ?></h3>
                <p>দাম: ৳<?php echo $row['price']; ?></p>
                <p>ব্র্যান্ড: <?php echo $row['brand']; ?></p>
                <a href="dashboard.php?delete=<?php echo $row['id']; ?>" class="delete-btn" onclick="return confirm('আপনি কি এই প্রোডাক্টটি ডিলিট করতে চান?')">Delete</a>
                <a href="order.php?id=<?php echo $row['id']; ?>" class="btn-order">Order Now</a>
            </div>
        <?php endwhile; ?>
    </div>

    <!-- নতুন প্রোডাক্ট অ্যাড করার ফর্ম -->
    <div class="add-form">
        <h3>নতুন প্রোডাক্ট যুক্ত করুন</h3>
        <form action="dashboard.php" method="POST" enctype="multipart/form-data">
            <input type="text" name="name" placeholder="প্রোডাক্টের নাম" required><br>
            <input type="number" step="0.01" name="price" placeholder="দাম" required><br>
            <input type="text" name="brand" placeholder="ব্র্যান্ডের নাম"><br>
            <input type="file" name="image"><br><br>
            <button type="submit" name="add_product">প্রোডাক্ট অ্যাড করুন</button>
        </form>
    </div>

</body>
</html>