<?php
 include 'koneksi.php';
 $id=$_GET['id'];

 $sql = mysqli_query($koneksi, DELETE FROM tb where id='$id');
   
 if($sql ){
    header('location: dasboadrh');
 }

?>