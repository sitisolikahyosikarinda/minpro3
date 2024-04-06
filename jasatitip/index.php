<?php
session_start();
include 'db.php';
if(!isset($_SESSION['status_login']) || $_SESSION['status_login'] != true){
    echo '<script>window.location="login.php"</script>';
    exit;
}

// Menyiapkan variabel untuk filter kategori
$where = '';

// Memeriksa apakah parameter kategori telah diterima
if(isset($_GET['kat'])){
    $kategori_id = $_GET['kat'];
    $where = "AND category_id = $kategori_id";
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
    <nav class="navbar navbar-expand-lg navbar-dark shadow p-3 
      fixed-top" style="background-color: #aa9ced;">
      <div class="container">
        <a class="navbar-brand" href="#">Liujungwoo</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#home">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="produk.php">Produk</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Akhir Navbar -->

    <!-- Jumbotron -->
    <section class="jumbotron text-center" style="margin-bottom: 60px; margin-top: 80px;">
        <img src="img/profil.png" alt="yosi karinda" width="450" class="rounded-circle img-thumbnail" />
        <h1 class="display-4">LiuJungwoo</h1>
        <p class="lead">check off your wish list</p>
    </section>
    <!-- Akhir jumbotron -->

    <!-- Search -->
    <!-- <div class="search">
        <div class="container">
            <form action="produk.php">
                <input type="text" name="search" placeholder="Cari Produk">
                <input type="submit" name="cari" value="Cari Produk" style="background-color: #aa9ced;">
            </form>
        </div>
    </div> -->
    <!-- end search -->

    <!-- category -->
    <!-- <div class="section" style="margin-top: 20px;">
        <div class="container">
            <h3>Kategori</h3>
            <table align="center">
                <tr>
                    <?php
                    $kategori = mysqli_query($conn, "SELECT * FROM tb_category ORDER BY category_id DESC");
                    if (mysqli_num_rows($kategori) > 0) {
                        while($k = mysqli_fetch_array($kategori)) {
                            ?>
                            <td style="padding: 20px;">
                                <a href="produk.php?kat=<?php echo $k['category_id'] ?>">
                                    <img src="img/kategori_clothes.png" width="50px" style="margin-bottom:2px;">
                                    <p><?php echo $k['category_name'] ?></p>
                                </a>
                            </td>
                            <?php
                        }
                    } else {
                        ?>
                        <td>
                            <p>Kategori tidak ada</p>
                        </td>
                        <?php
                    }
                    ?>
                </tr>
            </table>
        </div>
    </div> -->
    <!-- end category -->

    <!-- Produk -->
    <!-- <div class="section">
        <div class="container">
            <h3>Produk</h3>
            <div class="row justify-content-center">
                <?php
                // Mengambil data produk sesuai dengan kategori yang dipilih
                $produk = mysqli_query($conn, "SELECT * FROM tb_product WHERE product_status = 1 $where ORDER BY product_id DESC");
                if(mysqli_num_rows($produk) > 0) {
                    while($p = mysqli_fetch_array($produk)) {
                        ?>
                        <div class="col-md-4 mb-3 d-flex align-items-center">
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
    </div> -->
    <!-- Akhir produk -->

    <!-- BESTSELLER -->
    <section id="skill">
        <div class="container">
            <div class="row text-center mb-3">
                <div class="col">
                    <h2>⁉️SALE⁉️</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <img src="img/product_item1_jaemin_top.jpeg" class="card-img-top" alt="skill1">
                        <div class="card-body">
                            <p class="card-text">⁉️[15 OFF]⁉️ CATS ARE MY IDOL CAP </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <img src="img/product_item2_jaemin_shirti.jpeg" class="card-img-top" alt="skill2">
                        <div class="card-body">
                            <p class="card-text">⁉️[CAUPON SALE]⁉️ LOVE CRYING CAT LS </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <img src="img/product_item4_kiming_shirt.jpeg" class="card-img-top" alt="skill3">
                        <div class="card-body">
                            <p class="card-text">⁉️[30% OFF]⁉️ LOVE PUNK PIGMENT SWEATSHIRT </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end BESTSELLER-->

</body>
</html>
