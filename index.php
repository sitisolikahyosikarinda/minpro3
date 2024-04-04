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
        <a class="navbar-brand" href="login.php">Liujungwoo</a> <!-- Mengarahkan tautan ke login.php -->
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
        <h1 style="text-align: center;">Batch 1 Korea dibuka 7-20 April 2024 jangan sampai ketinggalan</h1>
    </section>
    <!-- Akhir jumbotron -->

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

    <!-- Formulir Registrasi -->
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2 class="mb-4">⁉️Wajib isi untuk masuk pendataan LiuJungwoo⁉️</h2>
                <p>Warning!! tidak mengisi = tidak didata = barang anda tidak dapat tervalidasi untuk di pesan</p>
                <form id="registrationForm" action="proses_registrasi.php" method="post">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username:</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password:</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat:</label>
                        <textarea class="form-control" id="alamat" name="alamat" rows="3" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="no_telp" class="form-label">Nomor Telepon:</label>
                        <input type="text" class="form-control" id="no_telp" name="no_telp" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Daftar</button>
                </form>
            </div>
        </div>
    </div>
    <!-- Akhir Formulir Registrasi -->

    <script>
        // Menangani pengiriman formulir registrasi
        document.getElementById("registrationForm").addEventListener("submit", function(event) {
            // Menghentikan pengiriman formulir
            event.preventDefault();
            
            // Menampilkan pop-up "data disimpan"
            alert("Data disimpan");

            // Mengarahkan pengguna ke halaman produk.php
            window.location.href = "produk.php";
        });
    </script>

</body>
</html>
