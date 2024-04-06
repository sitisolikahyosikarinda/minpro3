<?php
include 'db.php';

// Mengambil informasi admin dari database
$query = mysqli_query($conn, "SELECT * FROM tb_admin LIMIT 1");
$admin = mysqli_fetch_assoc($query);

// Ambil data produk berdasarkan ID
$p = null; // Inisialisasi $p agar tidak terjadi kesalahan ketika mencoba mengakses properti
if(isset($_GET['id'])) {
    $produk = mysqli_query($conn, "SELECT * FROM tb_product WHERE product_id = '".$_GET['id']."'");
    if(mysqli_num_rows($produk) > 0) {
        $p = mysqli_fetch_object($produk);
    } else {
        echo "Produk tidak ditemukan"; // Tampilkan pesan jika produk tidak ditemukan
    }
} else {
    echo "ID produk tidak ditemukan"; // Tampilkan pesan jika parameter id tidak ada di URL
}
?>
 
<!DOCTYPE html>
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

<body id="home" style="margin-top: 60px;">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark shadow p-3 fixed-top" style="background-color: #aa9ced;">
        <div class="container">
            <a class="navbar-brand" href="index.php">Liujungwoo</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="produk.php">Produk</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Akhir Navbar -->

    <!-- Detail Produk -->
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <?php if($p): ?>
                <div class="card">
                    <img src="produk/<?php echo $p->product_image; ?>" class="card-img-top" alt="Product Image">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $p->product_name; ?></h5>
                        <p class="card-text">Rp. <?php echo number_format($p->product_price); ?></p>
                        <p class="card-text"><?php echo $p->product_description; ?></p>
                        <a href="https://wa.me/<?php echo $admin['admin_telp']; ?>?text=Halo,%20saya%20ingin%20memesan%3A%0AProduk:%20<?php echo $p->product_name; ?>%0AHarga:%20<?php echo $p->product_price; ?>%0AJumlah:%20%5Bmasukkan%20jumlah%20yang%20ingin%20dipesan%5D%0A%0A" target="_blank" class="btn btn-success">Pesan via WhatsApp</a>
                    </div>
                </div>
                <?php else: ?>
                <p class="text-center">Produk tidak ditemukan</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <!-- Akhir Detail Produk -->

    <!-- footer -->
    <footer>
        <div class="container">
            <small>Copyright &copy; 2024 - LliuJungwoo</small>
        </div>
    </footer>
</body>
</html>
