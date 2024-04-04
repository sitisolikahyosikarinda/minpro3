<?php
include 'db.php';
session_start();
if($_SESSION['status_login'] != true){
    echo '<script>window.location="login.php"</script>';
    exit; // Hentikan eksekusi skrip jika status login tidak benar
}

// Ambil data admin dari database
$query = "SELECT * FROM tb_admin LIMIT 1"; // Batasi hasil query menjadi satu baris saja
$result = mysqli_query($conn, $query);

// Periksa jika ada data admin
if ($result && mysqli_num_rows($result) > 0) {
    $adminData = mysqli_fetch_assoc($result);
    $admin_id = $adminData['admin_id'];
    $admin_name = $adminData['admin_name'];
    $username = $adminData['username'];
} else {
    echo "Data admin tidak ditemukan!";
    exit; // Hentikan eksekusi skrip jika data admin tidak ditemukan
}
?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- custom css -->
    <link rel="stylesheet" href="style.css" />
    <title>Jasatitip</title>
</head>

<body>

<!-- header -->
<header>
    <div class="container">
        <h1><a href="dashboard.php">Liujungwoo</a></h1>
        <ul>
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="informasi.php">Informasi</a></li>
            <li><a href="data-kategori.php">Data kategori</a></li>
            <li><a href="data-produk.php">Data produk</a></li>
            <li><a href="keluar.php">Logout</a></li>
        </ul>
    </div>
</header>

<!-- content -->
<div class="section">
    <div class="container">
        <h3>Tambah Data Kategori</h3>
        <div class="box">
            <form action="" method="POST">
                <input type="text" name="nama" placeholder="Nama Kategori" class="input-control" required>
                <!-- Tambahkan input lainnya sesuai dengan kebutuhan -->
                <input type="submit" name="submit" value="Tambah" class="btn">
            </form>
            <?php
                if(isset($_POST['submit'])){
                    $nama = ucwords($_POST['nama']); // Perbaiki penulisan variable POST

                    $insert = mysqli_query($conn, "INSERT INTO tb_category (category_name) VALUES ('$nama')"); // Sesuaikan query untuk insert data
                    if($insert){
                        echo '<script>alert("Data berhasil ditambahkan."); window.location.href="data-kategori.php";</script>'; // Tambahkan notifikasi berhasil dan redirect ke halaman data kategori
                    }else{
                        echo '<script>alert("Gagal menambahkan data: ' . mysqli_error($conn) . '");</script>'; // Tampilkan pesan error jika query gagal
                    }
                }
            ?>
        </div>
    </div>
</div>

<!-- footer -->
<footer>
    <div class="container">
        <small>Copyright &copy; 2024 - LliuJungwoo</small>
    </div>
</footer>

</body>
</html>
