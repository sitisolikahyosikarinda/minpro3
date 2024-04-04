<?php
    include 'db.php';
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

    <!-- Jumbotron -->
    <section class="jumbotron text-center" style="margin-bottom: 60px; margin-top: 80px;"> <!-- Tambahkan style "margin-top: 80px;" di sini -->
    <a href="index.php"><img src="img/profil.png" alt="Profile" width="450" class="rounded-circle img-thumbnail"/></a>
    
   
        <h1 class="display-4">LiuJungwoo</h1>
        <p class="lead">check off your wish list</p>
    </section>
    <!-- Akhir jumbotron -->

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
<!-- produk -->
    <div class="section">
        <div class="container">
            <h3>Produk</h3>
            <div class="row justify-content-center"> <!-- Menggunakan justify-content-center untuk memusatkan elemen -->
                <?php
                    $where = ""; // Inisialisasi variabel $where
                    if(isset($_GET['search']) && $_GET['search'] != ''){ // Memeriksa apakah pencarian dilakukan
                        $where = "AND product_name LIKE '%".$_GET['search']."%' "; // Menambahkan kondisi WHERE untuk pencarian
                    }
                    $produk = mysqli_query($conn, "SELECT * FROM tb_product WHERE product_status = 1  $where ORDER BY product_id DESC");
                    if(mysqli_num_rows($produk) > 0) {
                        while($p = mysqli_fetch_array($produk)) {
                ?>
                    <div class="col-md-4 mb-3 d-flex align-items-center"> <!-- Menambahkan kelas d-flex dan align-items-center -->
                        <div class="card">
                            <img src="produk/<?php echo $p['product_image'] ?>" class="card-img-top" alt="<?php echo $p['product_name'] ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $p['product_name'] ?></h5>
                                <p class="card-text">Rp. <?php echo $p['product_price'] ?></p>
                                <a href="detail-produk.php?id=<?php echo $p['product_id'] ?>" class="btn btn-primary">Lihat Detail</a>
                            </div>
                        </div>
                    </div>
                <?php
                        }
                    } else {
                ?>
                    <p class="col">Produk tidak ada</p>
                <?php
                    }
                ?>
            </div>
        </div>
    </div>

</body>
</html>
