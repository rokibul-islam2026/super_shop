 <?php
session_start();
include 'db.php';

$message = '';

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username === 'admin' && $password === '123456') {
        $_SESSION['admin'] = $username;
        header("Location: dashboard.php"); // লগইন সফল হলে ড্যাশবোর্ডে যাবে
        exit();
    } else {
        $message = "ভুল ব্যবহারকারীর নাম বা পাসওয়ার্ড!";
    }
}
?>

<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8">
    <title>Login - Super Shop</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f4f4; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; }
        .login-card { background: white; padding: 30px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); width: 300px; text-align: center; }
        .login-card input { width: 90%; padding: 10px; margin: 10px 0; border: 1px solid #ccc; border-radius: 4px; }
        .login-card button { width: 95%; padding: 10px; background: #007bff; color: white; border: none; border-radius: 4px; cursor: pointer; font-size: 16px; }
        .error { color: red; font-size: 14px; }
    </style>
</head>
<body>

    <div class="login-card">
        <h2>Admin Login</h2>
        <?php if (!empty($message)): ?>
            <p class="error"><?php echo $message; ?></p>
        <?php endif; ?>
        <form action="login.php" method="POST">
            <input type="text" name="username" placeholder="Username (admin)" required><br>
            <input type="password" name="password" placeholder="Password (123456)" required><br>
            <button type="submit" name="login">Login</button>
        </form>
    </div>

</body>
</html>