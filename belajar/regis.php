<?php 
include 'koneksi.php';

if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
   
    $simpan = mysqli_query(
        $koneksi, "INSERT  INTO tb (username,password ) "
         VALUES ('$username', '$password')
    )
}if($masuk > 0){
    header('location : login.php');

}else{
    header('location : login.php');
}
?>