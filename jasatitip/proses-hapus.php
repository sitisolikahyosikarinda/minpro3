<?php
include "db.php";

if(isset($_GET['idk'])){
    $delete = mysqli_query($conn, "DELETE FROM tb_category WHERE category_id = '".$_GET['idk']."' ");
    if($delete){
        echo '<script>alert("Data kategori berhasil dihapus."); window.location="data-kategori.php";</script>';
    } else {
        echo '<script>alert("Gagal menghapus data kategori."); window.location="data-kategori.php";</script>';
    }
}

if(isset($_GET['idp'])){
    $produk = mysqli_query($conn, "SELECT product_image FROM tb_product WHERE product_id ='".$_GET['idp']."' ");
    $sp = mysqli_fetch_object($produk);
    unlink('./produk/'.$sp->product_image);

    $delete = mysqli_query($conn, "DELETE FROM tb_product WHERE product_id = '".$_GET['idp']."' ");
    if($delete){
        echo '<script>alert("Data produk berhasil dihapus."); window.location="data-produk.php";</script>';
    } else {
        echo '<script>alert("Gagal menghapus data produk."); window.location="data-produk.php";</script>';
    }
}
?>
