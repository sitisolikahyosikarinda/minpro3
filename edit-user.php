<?php
include 'db.php'; // Menghubungkan ke file koneksi database

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = mysqli_query($conn, "SELECT * FROM tb_users WHERE id_users = '$id'");
    $data_user = mysqli_fetch_assoc($query);

    if(!$data_user) {
        echo '<script>alert("Data pengguna tidak ditemukan.");</script>';
        echo '<script>window.location="informasi.php"</script>';
        exit();
    }
} else {
    echo '<script>window.location="informasi.php"</script>';
    exit();
}

if(isset($_POST['simpan'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $uname_ig = $_POST['uname_ig'];
    $alamat = $_POST['alamat'];
    $no_telp = $_POST['no_telp'];

    $update = mysqli_query($conn, "UPDATE tb_users SET
                    username = '$username',
                    email = '$email',
                    uname_ig = '$uname_ig',
                    alamat = '$alamat',
                    no_telp = '$no_telp'
                    WHERE id_users = '$id' ");
    if($update){
        echo '<script>alert("Data pengguna berhasil diubah.");</script>';
        echo '<script>window.location="informasi.php"</script>';
    }else{
        echo '<script>alert("Gagal mengubah data pengguna: ' . mysqli_error($conn) . '");</script>';
    }
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
    <title>Edit Pengguna</title>
</head>

<body>
<div class="container">
    <h3>Edit Pengguna</h3>
    <form action="" method="POST" id="form-edit">
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username" value="<?php echo $data_user['username']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo $data_user['email']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="uname_ig" class="form-label">Nama Instagram</label>
            <input type="text" class="form-control" id="uname_ig" name="uname_ig" value="<?php echo $data_user['uname_ig']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $data_user['alamat']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="no_telp" class="form-label">No. Telepon</label>
            <input type="text" class="form-control" id="no_telp" name="no_telp" value="<?php echo $data_user['no_telp']; ?>" required>
        </div>
        <button type="submit" name="simpan" class="btn btn-primary">Simpan Perubahan</button>
    </form>
</div>
</body>
</html>
