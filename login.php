<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <div class="login-container">
        <div class="login-image">
            <img src="">  
        </div>
        <div class="login-form">
            <a href="index.php" class="back-button">← Back</a>
            <h2>Account Login</h2>
            <p>Welcome back, fighter.</p>
            
            <!-- Menampilkan pesan error jika ada -->
            <?php if (isset($_GET['error'])): ?>
                <p style="color: red;"><?= htmlspecialchars($_GET['error']); ?></p>
            <?php endif; ?>

            <form action="login-process.php" method="POST">
                <label for="email">Email address</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" required>
                
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>
                
                <div class="remember-me">
                    <input type="checkbox" id="remember">
                    <label for="remember">Remember me</label>
                </div>
                
                <button type="submit" class="btn-login">Login Account</button>
            </form>
            <p>Don't have an account? <a href="register.php">Register here</a></p>
        </div>
    </div>
</body>
</html>
