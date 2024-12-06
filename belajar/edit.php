<?php 
 if(isset($_POST['simpan'])){
    $username = $_POST['nama'];
    $barang = $_POST['produk'];

    $simpan= mysqli_query($koneksi, "UPDATE TB SET nama='$username',produk='$barang'");
    header('locaion : das.php');
 }
?>