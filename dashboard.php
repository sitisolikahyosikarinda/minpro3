<?php
session_start();
if($_SESSION['status_login'] != true){
    echo '<script>window.location="login.php"</script>';
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

    <!-- Navbar -->
<!-- 
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #aa9ced;">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">LliuJungwoo</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">  Menggunakan ms-auto untuk menempatkan menu di sebelah kanan -->
                <!-- <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="profil.php">Profil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="data-kategori.php">Data kategori</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="data-produk.php">Data produk</a>
                </li>
            </ul>
        </div>
    </div>
</nav> --> 

<!-- Akhir Navbar -->

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
<div class="section" style="background-color: #ddd5f3;">
    <div class="container">
        <h3>Dashboard</h3>
        <div class="box">
            <h4>Selamat datang admin <?php echo $_SESSION['admin_global']->admin_name; ?> selamat bekerja!</h4> <!-- Tambahkan echo dan tanda titik (.) untuk menggabungkan string -->
        </div>
    </div>
</div>




<!-- motivasi -->
<div class="container" style="background-color: #f0f0f0; padding: 20px;">
    <div class="row text-center mb-3">
        <div class="col">
            <h2>Attention!</h2>
        </div>
    </div>
    <div class="row justify-content-center fs-5 text-center">
        <div class="col-md-4">
            <p>Selamat bertugas para staff LliuJungwoo 
                Tetaplah gigih dan fokus pada tujuanmu. 
                Setiap langkah kecilmu hari ini membawa
                kesuksesan besar esok hari. Kreativitasmu
                adalah kunci untuk melewati tantangan. 
                Percayalah pada dirimu sendiri dan jadilah 
                pionir dalam segala hal yang kamu lakukan. 
                Kesuksesan tak terelakkan bagi mereka yang 
                tekun dan berani mengambil risiko</p>
        </div>
        <div class="col-md-4">
            <p>Jangan lupa cek jadwal, cek tanggal cek barang 
                juga! tetap semangat admin LliuJungwoo patuhi 
                peraturan staff yang ada Sebagai staff admin, 
                kita harus mengutamakan kerja tim, ketepatan 
                waktu, dan profesionalisme dalam setiap tindakan. Jaga 
                kerahasiaan informasi, dan selalu memberikan 
                pelayanan terbaik kepada pelanggan. Hindari 
                konflik, dan terus tingkatkan kualitas kerja. </p>
        </div>
    </div>
</div>


      <!-- akhir motivasi -->

      
    <footer>
        <div class="container">
            <small>Copyright &copy; 2024 - LliuJungwoo</small>
        </div>
    </footer>

<!-- Jumbotron -->
<!-- <section class="jumbotron text-center">
      <img src="img/profil.png" alt="yosi karinda" width="200"
      class="rounded-circle img-thumbnail" />
      <h1 class="display-4">LliuJungwoo</h1>
      <p class="lead"> check off your wish list</p>
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#ffffff" fill-opacity="1" d="M0,256L18.5,224C36.9,192,74,128,111,96C147.7,64,185,64,222,85.3C258.5,107,295,149,332,144C369.2,139,406,85,443,101.3C480,117,517,203,554,240C590.8,277,628,267,665,229.3C701.5,192,738,128,775,101.3C812.3,75,849,85,886,117.3C923.1,149,960,203,997,192C1033.8,181,1071,107,1108,90.7C1144.6,75,1182,117,1218,138.7C1255.4,160,1292,160,1329,181.3C1366.2,203,1403,245,1422,266.7L1440,288L1440,320L1421.5,320C1403.1,320,1366,320,1329,320C1292.3,320,1255,320,1218,320C1181.5,320,1145,320,1108,320C1070.8,320,1034,320,997,320C960,320,923,320,886,320C849.2,320,812,320,775,320C738.5,320,702,320,665,320C627.7,320,591,320,554,320C516.9,320,480,320,443,320C406.2,320,369,320,332,320C295.4,320,258,320,222,320C184.6,320,148,320,111,320C73.8,320,37,320,18,320L0,320Z"></path></svg>
    </section> -->
    <!-- Akhir Jumbotron -->



</body>
</html>
