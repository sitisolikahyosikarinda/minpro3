<?php
// koneksi database
    $hostname = 'localhost';
    $username = 'root';
    $password = '';
    $dbname   = 'jasatitip';

    $conn = mysqli_connect($hostname, $username, $password, $dbname);
    // if ($conn) {
    //     echo "<script>alert('berhasil');</script>";
    // } else {
    //     echo "<script>alert('gagal');</script>";
    // }
?>