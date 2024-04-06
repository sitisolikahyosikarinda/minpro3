<?php
session_start();
include 'db.php';
if(!isset($_SESSION['status_login']) || $_SESSION['status_login'] != true){
    echo '<script>window.location="login.php"</script>';
    exit;
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
            <li><a href="keluar.php">logout</a></li>
        </ul>
    </div>
</header>
<!-- content -->
<div class="section">
    <div class="container">
        <h3>Data Kategori</h3>
        <div class="box">
            <p><a href="tambah-kategori.php">Tambah Kategori</a></p>
            <table border="1" cellspacing="0" class="table">
                <thead>
                    <tr>
                        <th >No</th>
                        <th >Kategori</th>
                        <th >Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $kategori = mysqli_query($conn, "SELECT * FROM tb_category ORDER BY category_id DESC");
                    $no = 1; // Variabel untuk nomor urut
                    if(mysqli_num_rows($kategori) > 0){
                        while($row = mysqli_fetch_array($kategori)){
                    ?>
                    <tr>
                        <td><?php echo $no++ ?></td> <!-- Tampilkan nomor urut -->
                        <td><?php echo $row['category_name'] ?></td> <!-- Tampilkan nama kategori -->
                        <td>
                            <a href="edit-kategori.php?id=<?php echo $row['category_id'] ?>">Edit</a> || <a href="proses-hapus.php?idk=<?php echo $row['category_id'] ?>" onclick="return confirm('Yakin ingin dihapus ?')">Hapus</a> <!-- Perbaikan: tambahkan tanda petik pada href -->
                        </td>
                    </tr>
                    <?php
                        }
                    } else {
                    ?>
                        <tr>
                            <td colspan="3">Tidak ada data</td> <!-- Perbaikan: tambahkan tanda petik pada atribut colspan -->
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
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
