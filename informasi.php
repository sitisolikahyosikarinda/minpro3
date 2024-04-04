<?php
include 'db.php'; // Menghubungkan ke file koneksi database

// Mengambil data admin dari tabel tb_admin
$query_admin = mysqli_query($conn, "SELECT * FROM tb_admin LIMIT 1");
$data_admin = mysqli_fetch_assoc($query_admin);

// Periksa apakah data admin berhasil diambil
if ($data_admin) {
    $admin_id = $data_admin['admin_id'];
    $admin_name = $data_admin['admin_name'];
    $username = $data_admin['username'];
    $admin_telp = $data_admin['admin_telp'];
    $admin_email = $data_admin['admin_email'];
    $admin_address = $data_admin['admin_address'];
} else {
    // Jika tidak ada data admin, atur semua nilai menjadi string kosong
    $admin_id = '';
    $admin_name = '';
    $username = '';
    $admin_telp = '';
    $admin_email = '';
    $admin_address = '';
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
        <h3>Profil Admin</h3>
        <div class="box">
            <form action="" method="POST" id="form-profile">
                <input type="text" name="nama" placeholder="Nama Lengkap" class="input-control" value="<?php echo $admin_name; ?>" required>
                <input type="text" name="user" placeholder="Username" class="input-control" value="<?php echo $username; ?>" required>
                <input type="text" name="hp" placeholder="No Hp" class="input-control" value="<?php echo $admin_telp; ?>" required>
                <input type="email" name="email" placeholder="Email" class="input-control" value="<?php echo $admin_email; ?>" required>
                <input type="text" name="alamat" placeholder="Alamat" class="input-control" value="<?php echo $admin_address; ?>" required>
                <input type="submit" name="ubah" value="Ubah Profil" class="btn">
            </form>
            <?php
                if(isset($_POST['ubah'])){
                    $nama   = $_POST['nama'];
                    $user   = $_POST['user'];
                    $hp     = $_POST['hp'];
                    $email  = $_POST['email'];
                    $alamat = $_POST['alamat'];

                    $update = mysqli_query($conn, "UPDATE tb_admin SET
                                    admin_name = '$nama',
                                    username = '$user',
                                    admin_telp = '$hp',
                                    admin_email = '$email',
                                    admin_address = '$alamat'
                                    WHERE admin_id = '$admin_id' ");
                    if($update){
                        echo '<script>alert("Data berhasil diubah.");</script>';
                    }else{
                        echo '<script>alert("Gagal mengubah data: ' . mysqli_error($conn) . '");</script>';
                    }
                
                }
            ?>
        </div>

        <!-- mengubah password -->

        <h3>Ubah Password</h3>
        <div class="box">
            <form action="" method="POST" id="form-password">
                <input type="password" name="pass1" placeholder="Password Baru" class="input-control" required>
                <input type="password" name="pass2" placeholder="Konfirmasi Password Baru" class="input-control" required>
                <input type="submit" name="ubah_password" value="Ubah Password" class="btn">
            </form>
            <?php
                if(isset($_POST['ubah_password'])){
                    $pass1   = $_POST['pass1'];
                    $pass2   = $_POST['pass2'];

                    if($pass2 != $pass1){
                        echo '<script>alert("Konfirmasi password baru tidak sesuai")</script>';
                    }else{
                        $u_pass = mysqli_query($conn, "UPDATE tb_admin SET
                                    password = '$pass1'
                                    WHERE admin_id = '$admin_id' ");
                        if($u_pass){
                            echo '<script>alert("Password berhasil diubah.");</script>';
                            echo '<script>window.location="informasi.php"</script>';
                        }else{
                            echo '<script>alert("Gagal mengubah password: ' . mysqli_error($conn) . '");</script>';
                        }
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
