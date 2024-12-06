<?php 
include 'koneksi.php';

if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $login = mysqli_query(
        $koneksi, "SELECT * FROM TB_USR username='$username' and password = '$password' " 
    )
}else{
    echo "akun salah";
    header("location : login.php");
}
?>