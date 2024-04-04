<?php
// koneksi database
    $hostname = 'localhost';
    $username = 'root';
    $password = '';
    $dbname   = 'jasatitip';

    $conn = mysqli_connect($hostname, $username, $password, $dbname) or die ('Gagal terhubung ke database')
?>