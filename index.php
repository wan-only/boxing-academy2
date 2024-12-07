<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boxing Academy</title>
    <link rel="stylesheet" href="./css/styles.css">
</head>

<body>
    <nav>
        <div class="logo">
        <span class="logo-boxing">BOXING</span> 
        <span class="Academy">ACADEMY</span>
        </div>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="classes.php">Classes</a></li>
            <li><a href="#">Contact</a></li>
            <li><a href="profile.php">Profile</a></li>
        </ul>
         <img src="css/asset/profile.png" class="profile-img" id="profile-img">

         <div id="dropdown-menu" class="dropdown-menu">
        <ul>
            <li><a href="admin.php">Admin</a></li>
            <li><a href="login.php">User</a></li>
        </ul>
    </div>
    </nav>
    <section class="hero-section">
        <h1 class="fade-text">When Persistence</h1>
        <span class="fade-text">Meets Opportunity</span>
        <div class="button-container">
            <button class="center-button" onclick="location.href='login.php'">login</button>
            <button class="center-button" onclick="location.href='register.php'">Register</button>
        </div>
    </section>
    <div class="text-bottom">
        <h1>WELCOME TO BOXING ACADEMY</h1>
    </div>
    <footer class="contact-info">
        <div class="contact-item">
            <i class="fas fa-map-marker-alt"></i> 
            <h3>Training Center</h3>
            <p>Malang, kecamatan klontang, jl.ditempat</p>
        </div>
        <div class="contact-item">
            <i class="fas fa-phone"></i> 
            <h3>Call Us</h3>
            <p>082140645241</p>
        </div>
        <div class="contact-item">
            <i class="fas fa-envelope"></i> 
            <h3>Book a Class</h3>
            <p>ali@levelgroundmma.org</p>
        </div>
    </footer>

    <script src="script/index.js"></script>


</body>


</html>