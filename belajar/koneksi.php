<?php
$koneksi=mysqli_connect('localhost','root','','db');

if(!$koneksi){
    die('koneksi gagal'. mysqli_connect_error());
}
?>