<?php
include 'db.php';
// Memeriksa apakah data dikirimkan melalui metode POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Memeriksa apakah semua field formulir telah diisi
    if (isset($_POST["username"]) && isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["uname_ig"]) && isset($_POST["alamat"]) && isset($_POST["no_telp"])) {
        // Mengambil data dari formulir
        $username = $_POST["username"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $uname_ig = $_POST["uname_ig"];
        $alamat = $_POST["alamat"];
        $no_telp = $_POST["no_telp"];

        // Melakukan validasi atau sanitasi data jika diperlukan

        // Menyimpan data ke database
         // Menghubungkan ke file koneksi database
        $query = "INSERT INTO tb_users (username, email, password, uname_ig, alamat, no_telp) VALUES ('$username', '$email', '$password', '$uname_ig', '$alamat', '$no_telp')";
        $result = mysqli_query($conn, $query);

        if ($result) {
            // Jika penyimpanan berhasil, redirect ke halaman sukses atau halaman lain
            header("Location: produk.php");
            exit;
        } else {
            // Jika terjadi kesalahan saat penyimpanan, tampilkan pesan kesalahan
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        // Jika ada field yang belum diisi, tampilkan pesan kesalahan
        echo "Semua field harus diisi.";
    }
} else {
    // Jika data tidak dikirimkan melalui metode POST, redirect ke halaman lain atau tampilkan pesan kesalahan
    echo "Metode yang digunakan tidak valid.";
}
?>
