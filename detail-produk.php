<?php
    include 'db.php';

    // Mengambil informasi admin dari database
    $query = mysqli_query($conn, "SELECT * FROM tb_admin LIMIT 1");
    $admin = mysqli_fetch_assoc($query);

    // Ambil data produk berdasarkan ID
    if(isset($_GET['id'])) {
        $produk = mysqli_query($conn, "SELECT * FROM tb_product WHERE product_id = '".$_GET['id']."'");
        $p = mysqli_fetch_object($produk);
    } else {
        // Redirect atau tampilkan pesan kesalahan jika ID produk tidak ditemukan
        // Contoh:
        // echo "ID produk tidak ditemukan";
        // atau redirect ke halaman lain
        // header("Location: error.php");
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

<body id="home" style="margin-top: 60px;"> <!-- Tambahkan style="margin-top: 60px;" pada body untuk memberikan ruang kosong di bagian atas -->
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark shadow p-3 
      fixed-top" style="background-color: #aa9ced;">
      <div class="container">
        <a class="navbar-brand" href="index.php">Liujungwoo</a> <!-- Tambahkan href ke index.php -->
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

    <!-- Search -->
    <div class="search text-center"> <!-- Menambahkan kelas text-center untuk memusatkan form pencarian -->
        <div class="container">
            <form action="produk.php" method="GET"> <!-- Menambahkan method GET -->
                <input type="text" name="search" placeholder="Cari Produk">
                <input type="submit" name="cari" value="Cari Produk" style="background-color: #aa9ced;">
            </form>
        </div>
    </div>
    <!-- end search -->

    <!-- detail produk -->
    <h3 class="text-center">Detail Produk</h3>
    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-6 text-center"> <!-- Menambahkan kelas text-center untuk membuat rata tengah -->
                    <img src="produk/<?php echo $p->product_image; ?>" class="img-fluid" alt="Product Image"> <!-- Menambahkan kelas img-fluid untuk membuat gambar responsif -->
                </div>
                <div class="col-6 text-center"> <!-- Menambahkan kelas text-center untuk membuat rata tengah -->
                    <h3><?php echo $p->product_name ?></h3>
                    <h4> Rp. <?php echo number_format($p->product_price)?></h4>
                    <p>Deskripsi</p>
                    <?php echo $p->product_description ?>
                    <!-- Tombol WhatsApp -->
                    <a href="https://wa.me/<?php echo $admin['admin_telp']; ?>?text=Halo,%20saya%20ingin%20memesan%3A%0AProduk:%20<?php echo $p->product_name; ?>%0AHarga:%20<?php echo $p->product_price; ?>%0AJumlah:%20%5Bmasukkan%20jumlah%20yang%20ingin%20dipesan%5D%0A%0A" target="_blank" class="btn btn-success">Pesan via WhatsApp</a>

                </div>
            </div>
        </div>
    </div>
    <!-- end detail produk -->

    <!-- Informasi Pemesanan -->
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <table class="table">
                    <thead>
                        <tr>
                            <th colspan="2">⁉️Informasi Pemesanan⁉️</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="2">
                                <h3 class="text-center">Untuk pemesanan setelah dibalas admin baru transfer ya kak, setelah itu bisa kirim bukti transfernya lagi lewat WA admin Terimakasihhh ❤</h3>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Akhir Informasi Pemesanan -->

</body>
</html>
