<?php
include 'db.php';
session_start();
if(!isset($_SESSION['status_login']) || $_SESSION['status_login'] != true){
    echo '<script>window.location="login.php"</script>';
    exit;
}

if(isset($_GET['id'])){
    $produk = mysqli_query($conn, "SELECT * FROM tb_product WHERE product_id = '".$_GET['id']."' ");
    if(mysqli_num_rows($produk) == 0){ // Perbaikan: tambahkan kurung untuk pembanding
        echo '<script>window.location="data-produk.php"</script>'; // Perbaikan: tambahkan tanda petik pada tag script
    }
    $p = mysqli_fetch_object($produk);
    if(!$p){
        echo '<script>alert("Data produk tidak ditemukan."); window.location="data-produk.php";</script>';
        exit;
    }
} else {
    echo '<script>alert("ID produk tidak ditemukan."); window.location="data-produk.php";</script>';
    exit;
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
        <h3>Edit Data Produk</h3>
        <div class="box">
            <form action="" method="POST" enctype="multipart/form-data">
               <select class="input-control" name="kategori" required>
                <option value="">--pilih--</option>
                <?php 
                    $kategori = mysqli_query($conn, "SELECT * FROM tb_category ORDER BY category_id DESC");
                    while($r = mysqli_fetch_array($kategori)){
                ?>
                <option value="<?php echo $r['category_id']; ?>" <?php echo ($r['category_id'] == $p->category_id) ? 'selected' : ''; ?>><?php echo $r['category_name'] ?></option>
                <?php } ?>
               </select>
                <input type="text" name="nama" class="input-control" placeholder="Nama Produk" value="<?php echo $p->product_name; ?>" required>
                <input type="text" name="harga" class="input-control" placeholder="Harga" value="<?php echo $p->product_price; ?>" required>
                
                <img src="produk/<?php echo $p->product_image ?>" width="150px">
                <input type="hidden" name="foto" value="<?php echo $p->product_image ?>">
                <input type="file" name="gambar" class="input-control">
                <textarea class="input-control" name="deskripsi" placeholder="Deskripsi"><?php echo $p->product_description; ?></textarea>
                <select class="input-control" name="status">
                    <option value="">--pilih--</option>
                    <option value="1" <?php echo ($p->product_status == 1) ? 'selected' : ''; ?>>--Aktif--</option>
                    <option value="2" <?php echo ($p->product_status == 2) ? 'selected' : ''; ?>>--Tidak Aktif--</option>
                </select>
                <input type="submit" name="submit" value="Simpan" class="btn">
            </form>
            <?php
                if(isset($_POST['submit'])){
                    // Menangani proses simpan perubahan data produk
                    // Disini Anda dapat menambahkan kode untuk memperbarui data produk ke database
                    $kategori   = $_POST['kategori'];
                    $nama       = $_POST['nama'];
                    $harga      = $_POST['harga'];
                    $deskripsi  = $_POST['deskripsi'];
                    $foto       = $_POST['foto'];

                    // Jika admin mengganti gambar
                    if($_FILES['gambar']['name'] != ''){
                        $filename = $_FILES['gambar']['name'];
                        $tmp_name = $_FILES['gambar']['tmp_name'];
                        $type1 = explode('.', $filename);
                        $type2 = $type1[1];
                        $newname = 'produk'.time().'.'.$type2;
                        $tipe_diizinkan = array('jpeg', 'jpg', 'png', 'gif');

                        if(in_array($type2, $tipe_diizinkan)){
                            unlink('./produk/'.$foto);
                            move_uploaded_file($tmp_name, './produk/'.$newname);
                            $namagambar = $newname;
                        } else {
                            echo '<script>alert("Format file tidak diizinkan.");</script>';
                        }
                    } else {
                        // Jika admin tidak mengganti gambar
                        $namagambar = $foto;
                    }

                    $status = $_POST['status'];

                    // Update data produk
                    $update = mysqli_query($conn, "UPDATE tb_product SET
                                            category_id = '".$kategori."',
                                            product_name = '".$nama."',
                                            product_price = '".$harga."',
                                            product_description = '".$deskripsi."',
                                            product_image = '".$namagambar."',
                                            product_status = '".$status."' 
                                            WHERE product_id = '".$p->product_id."' ");

                    if($update){
                        echo '<script>alert("Perubahan data berhasil disimpan."); window.location="data-produk.php";</script>';
                    } else {
                        echo 'gagal'.mysqli_error($conn);
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
