<?php
session_start();
include 'conect.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $email = $_POST['email'];
    $password = $_POST['password'];

    
    if (empty($email) || empty($password)) {
        
        echo "
            <script>
                alert('Email dan Password tidak boleh kosong');
                window.location = 'login.php';
            </script>
        ";
        exit();
    }

    
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        
        if (password_verify($password, $user['password'])) {
            
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['first_name'] = $user['first_name'];
            $_SESSION['last_name'] = $user['last_name'];
            $_SESSION['email'] = $user['email'];

            
            echo "
                <script>
                    alert('Login berhasil. Selamat datang, " . $user['first_name'] . "!');
                    window.location = 'admin.php';
                </script>
            ";
        } else {
            
            echo "
                <script>
                    alert('Password salah. Silakan coba lagi.');
                    window.location = 'login.php';
                </script>
            ";
        }
    } else {
     
        echo "
            <script>
                alert('Email tidak terdaftar. Silakan daftar terlebih dahulu.');
                window.location = 'register.php';
            </script>
        ";
    }
}
?>
