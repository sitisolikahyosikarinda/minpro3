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

// Fungsi untuk menampilkan pesan sukses dengan gaya yang lebih menarik
function showSuccess($message) {
    echo '<div class="alert alert-success" role="alert">' . $message . '</div>';
}

// Proses registrasi pengguna
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Periksa apakah username atau email sudah digunakan
    $check_user_query = mysqli_query($conn, "SELECT * FROM tb_users WHERE username='$username' OR email='$email'");
    if (mysqli_num_rows($check_user_query) > 0) {
        showError("Username atau email sudah digunakan.");
    } else {
        // Hash password sebelum disimpan
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Insert data pengguna ke database
        $register_query = mysqli_query($conn, "INSERT INTO tb_users (username, email, password) VALUES ('$username', '$email', '$hashed_password')");
        if ($register_query) {
            showSuccess("Registrasi berhasil. Silakan login.");
        } else {
            showError("Gagal mendaftar. Silakan coba lagi.");
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
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
        <h2 class="text-center mb-4">Register</h2>

        <!-- Form registrasi -->
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="mb-3">
                <label for="username" class="form-label">Username:</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary" name="register">Register</button>
            <p class="mt-3">Sudah punya akun? <a href="login-users.php">Login disini</a>.</p>
        </form>

        <!-- Pesan kesalahan atau sukses -->
        <?php if(isset($error_message)) { ?>
            <div class="alert alert-danger" role="alert"><?php echo $error_message; ?></div>
        <?php } ?>
        <?php if(isset($success_message)) { ?>
            <div class="alert alert-success" role="alert"><?php echo $success_message; ?></div>
        <?php } ?>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
