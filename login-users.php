<?php
session_start();
include 'db.php'; // Berkas koneksi database

// Fungsi untuk mengarahkan pengguna ke halaman index.php jika mereka sudah login
function redirectToIndex() {
    header("location: index.php");
    exit();
}

// Cek apakah pengguna sudah login, jika ya, arahkan ke halaman index.php
if (isset($_SESSION['username'])) {
    redirectToIndex();
}

// Fungsi untuk menampilkan pesan error dengan gaya yang lebih menarik
function showError($message) {
    echo '<div class="alert alert-danger" role="alert">' . $message . '</div>';
}

// Proses login pengguna
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Periksa apakah pengguna terdaftar dan password cocok
    $login_query = mysqli_query($conn, "SELECT * FROM tb_users WHERE username='$username'");
    $user = mysqli_fetch_assoc($login_query);

    if ($user && password_verify($password, $user['password'])) { // Jika pengguna terdaftar dan password cocok
        $_SESSION['username'] = $username;
        redirectToIndex(); // Redirect ke halaman index.php setelah login berhasil
    } else { // Jika pengguna tidak terdaftar atau password salah
        showError("Username atau password salah.");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        body {
            background-color: #f0f0f0; /* Warna latar belakang */
            padding-top: 20px;
        }
        .container {
            background-color: #ffffff; /* Warna latar belakang kotak form */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1); /* Efek bayangan */
            max-width: 400px; /* Lebar maksimum kotak form */
            margin: auto; /* Pusatkan kotak form */
        }
        .form-control {
            font-size: 14px; /* Ukuran font input */
        }
        .btn-primary {
            font-size: 14px; /* Ukuran font tombol */
        }
        .alert {
            margin-top: 10px; /* Jarak antara pesan alert dengan elemen di atasnya */
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="text-center mb-4">Login</h2>

        <!-- Form login -->
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="mb-3">
                <label for="username" class="form-label">Username:</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary" name="login">Login</button>
            <p class="mt-3">Belum punya akun? <a href="register-users.php">Daftar disini</a>.</p>
        </form>

        <!-- Pesan kesalahan -->
        <?php if(isset($error_message)) { ?>
            <div class="alert alert-danger" role="alert"><?php echo $error_message; ?></div>
        <?php } ?>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
