<?php 
include 'koneksi.php';

if(!isset($_GET['aksi'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
   
    $simpan= mysqli_query(
        $koneksi, "INSERT INTO tb (username,password)  "
         VALUES ('$username', '$password')
    )
}if($simpan > 0){
    header('location : login.php');

}else{
    header('location : regis.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    include 'koneksi.php';
    $id=$_GET['id'];
    
    $sql = mysqli_query($koneksi, SELECT * FROM tb );
    while ($my = mysqli_fetch_array ($sql)) {
    
    
    ?>
    <form action="" method="post">

        <input type="text" name="useranme">
        <input type="text"  name="barang">
    </form>
    <?php
    } ?>
    </body>
</html>