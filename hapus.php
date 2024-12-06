<?php 
include "koneksi.php";

$id = $_GET ['id'];

$query = mysqli_query($koneksi, "delete from produk where id='$id'" );

if($query){
    header('Location: dashboard.php');
}

?>