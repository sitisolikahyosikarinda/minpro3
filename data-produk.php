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
            <li><a href="keluar.php">Logout</a></li>
        </ul>
    </div>
</header>
<!-- content -->
<div class="section">
    <div class="container">
        <h3>Data Produk</h3>
        <div class="box">
            <p><a href="tambah-produk.php">Tambah Data</a></p>
            <table border="1" cellspacing="0" class="table">
                <thead>
                    <tr>
                        <th >No</th>
                        <th >Kategori</th>
                        <th >Nama Produk</th>
                        <th >Harga</th>
                        <th >Gambar</th>
                        <th >Status</th>
                        <th >Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $produk = mysqli_query($conn, "SELECT * FROM tb_product LEFT JOIN tb_category USING (category_id) 
                        ORDER BY product_id DESC");
                    $no = 1; // Variabel untuk nomor urut
                    if(mysqli_num_rows($produk) > 0){

                    while($row = mysqli_fetch_array($produk)){
                    ?>
                    <tr>
                        <td><?php echo $no++ ?></td> <!-- Tampilkan nomor urut -->
                        <td><?php echo $row['category_name'] ?></td> <!-- Tampilkan nama kategori -->
                        <td><?php echo $row['product_name'] ?></td>
                        <td>Rp. <?php echo number_format($row['product_price']) ?></td>
                        <td><a href="produk/<?php echo $row['product_image'] ?>" target="_blank"><img src="produk/<?php echo $row['product_image'] ?>" width="300px"></a></td>
                        <td><?php echo ($row['product_status'] == 0) ? 'Tidak Aktif' : 'Aktif'; ?></td>
                        <td>
                            <a href="edit-produk.php?id=<?php echo $row['product_id'] ?>">Edit</a> || 
                            <a href="proses-hapus.php?idp=<?php echo $row['product_id'] ?>" onclick="return confirm('Yakin dihapus?')">Hapus</a>
                        </td>
                    </tr>
                    <?php }}else{ ?>
                        <tr>
                            <td colspan="7">Data Kosong</td> 
                        </tr>

                    <?php } ?>
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
