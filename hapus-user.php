<?php
include 'db.php'; // Menghubungkan ke file koneksi database

if(isset($_GET['id'])) {
    $id = $_GET['id'];

    $delete = mysqli_query($conn, "DELETE FROM tb_users WHERE id_users = '$id'");
    if($delete){
        echo '<script>alert("Data pengguna berhasil dihapus.");</script>';
        echo '<script>window.location="informasi.php"</script>';
    }else{
        echo '<script>alert("Gagal menghapus data pengguna: ' . mysqli_error($conn) . '");</script>';
    }
} else {
    echo '<script>window.location="informasi.php"</script>';
    exit();
}
?>
