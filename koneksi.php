<?php

$koneksi = mysqli_connect ("localhost", "root", "", "db_toko");

if(!$koneksi) {
    die('koneksi gagal' . mysqli_connect_error());
}
?>