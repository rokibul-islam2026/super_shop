 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dhaka Icecream Industries</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f7f6;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background: #ffffff;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
            text-align: center;
            max-width: 550px;
            width: 90%;
            border: 1px solid #e0e0e0;
        }
        h1 {
            color: #2c3e50;
            margin-bottom: 5px;
            font-size: 36px;
        }
        h2 {
            color: #d32f2f;
            margin-top: 0;
            margin-bottom: 25px;
            font-size: 24px;
            font-weight: 600;
        }
        .logo-box {
            border: 2px dashed #b0bec5;
            padding: 20px;
            border-radius: 10px;
            background-color: #fafafa;
            margin-bottom: 25px;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .logo-box img {
            max-width: 100%;
            height: auto;
            max-height: 200px;
            object-fit: contain;
        }
        .btn-wrapper {
            text-align: right;
        }
        .login-btn {
            display: inline-block;
            background-color: #1976d2;
            color: white;
            padding: 12px 28px;
            text-decoration: none;
            border-radius: 6px;
            font-size: 16px;
            font-weight: bold;
            transition: background 0.3s ease;
        }
        .login-btn:hover {
            background-color: #115293;
        }
    </style>
</head>
<body>

    <div class="container">
        <!-- ১. Welcome -->
        <h1>Welcome</h1>

        <!-- ২. Dhaka Icecream Industries -->
        <h2>Dhaka Icecream Industries</h2>

        <!-- ৩. পোলার ব্র্যান্ডের লোগো (সরাসরি অনলাইন লিঙ্ক) -->
       <div class="logo-box" style="padding: 10px; font-size: 15px; color: #333; margin-bottom: 20px;">
    📍 <strong>Head Office:</strong> Khagan, Birulia, Savar, Dhaka.
</div>

<img src="images/ice-cream logo.jpg" alt="Dhaka Icecream Industries Banner" style="width: 100%; max-height: 280px; object-fit: contain; border-radius: 8px;">

        <!-- ৪. Login Page বাটন (ডানপাশে নিচে) -->
        <div class="btn-wrapper">
            <a href="login.php" class="login-btn">Login Page &rarr;</a>
        </div>
    </div>

</body>
</html>