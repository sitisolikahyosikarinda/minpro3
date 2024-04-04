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
        <h3>Tambah Data Produk</h3>
        <div class="box">
            <form action="" method="POST" enctype="multipart/form-data">
               <select class="input-control" name="kategori" required>
                <option value="">--pilih--</option>
                <?php 
                    $kategori = mysqli_query($conn, "SELECT * FROM tb_category ORDER BY category_id DESC");
                    while($r = mysqli_fetch_array($kategori)){
                ?>
                <option value="<?php echo $r['category_id']; ?>"><?php echo $r['category_name']; ?></option>
                <?php } ?>
               </select>
                <input type="text" name="nama" class="input-control" placeholder="Nama Produk" required>
                <input type="text" name="harga" class="input-control" placeholder="Harga" required>
                <input type="file" name="gambar" class="input-control" required>
                <textarea class="input-control" name="deskripsi" placelolder="Deskripsi"></textarea>
                <select class="input-control" name="status">
                    <option value="">--pilih--</option>
                    <option value="1">--Aktif--</option>
                    <option value="2">--Tidak Aktif--</option>
                </select>
                <input type="submit" name="submit" value="Tambah" class="btn">
            </form>
            <?php
                if(isset($_POST['submit'])){
                    
                    // print_r($_FILES['gambar']);
                    // menampung inputan dari form
                    $kategori   = $_POST['kategori'];
                    $nama       = $_POST['nama'];
                    $harga      = $_POST['harga'];
                    $deskripsi  = $_POST['deskripsi'];
                    $status     = $_POST['status'];
                    // menampung data file yang diupload
                    $filename =$_FILES['gambar']['name'];
                    $tmp_name =$_FILES['gambar']['tmp_name'];

                    $type1 = explode('.', $filename);
                    $type2 = $type1[1];

                    $newname = 'produk'.time().'.'.$type2;

                    // menampung data format file yang diizinkan
                    $tipe_diizinkan = array('jpeg', 'jpg', 'png','gif');
                    // validasi format file
                    if(!in_array($type2, $tipe_diizinkan)){
                    // jika format file tidak ada di dalam tipe diizinkan  
                        echo '<script>alert("Format file tidakdiizinkan")</script>';
                    }else{
                    // jika format file sesuai dengan yang ada di dalam array tipe diizinkan 
                    // proses upload file sekaligus insert ke database
                    move_uploaded_file($tmp_name, './produk/'.$newname);

                    $insert = mysqli_query($conn, "INSERT INTO tb_product VALUES (
                                null,
                                '".$kategori."',
                                '".$nama."',
                                '".$harga."',
                                '".$deskripsi."',
                                '".$newname."',
                                '".$status."',
                                null
                                    )");

                    if($insert){
                        echo '<script>alert("Tambah data berhasil")</script>';
                        echo '<script>window.location="data-produk.php"</script>';
                    }else{
                        echo 'gagal'.mysqli_error($conn);
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
