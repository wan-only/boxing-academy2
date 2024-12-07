<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/snackbar.css">
</head>
<body>
    <div class="login-container">
        <div class="login-image">
            <img src="" alt="">
        </div>
        <div class="login-form">
            <a href="index.php" class="back-button">← Back</a>
            <h2>Register Account</h2>
            <p>Join to be a Fighter</p>
            <form action="register-process.php" method="POST" onsubmit="showSnackbar(event)">
                <label for="fname">First Name</label>
                <input type="text" name="fName" id="fName" placeholder="First Name" required>

                <label for="lname">Last Name</label>
                <input type="text" name="lName" id="lName" placeholder="Last Name" required>

                <label for="email">Email address</label>
                <input type="email" name="email" id="email" placeholder="Enter your email" required>

                <label for="password">Password</label>
                <input type="password" name="password" id="password" placeholder="Enter your password" required>

                <div class="remember-me">
                    <input type="checkbox" id="remember">
                    <label for="remember">Remember me</label>
                </div>

                <button type="submit" class="btn-login">Register Account</button>
            </form>
        </div>
    </div>

</body>
</html>
