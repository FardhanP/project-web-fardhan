<?php
include 'koneksi.php';

if(isset($_POST['submit'])){
    $nama = $_POST['nama'];
    $username = $_POST['username'];    
    $password = $_POST['password'];
    $no_telepon = $_POST['no_telepon'];
    $alamat = $_POST['alamat'];
    if ($nama && $username && $password) {
      $simpan = mysqli_query($koneksi,"INSERT INTO tb_user(nama,username,password,no_telepon,alamat,role)
     VALUES('$nama','$username','$password','$no_telepon','$alamat','pelanggan')" );
     if($masuk > 0){
      header("location: login.php");
   }else{
      header("location: login.php");

   }
}
    }
?>

<!doctype html>
<html lang="en" data-bs-theme="auto">
  <head><script src="./assets/js/color-modes.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.122.0">
    <title>Sign in</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/sign-in/">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
    <link href="./assets/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body {
display: flex;
justify-content: center;
align-items: center;
height: 100vh;
margin: 0;

}

</style>

    
    <!-- Custom styles for this template -->
    <link href="sign-in.css" rel="stylesheet">
  </head>
  <body class=" font-[poppins] align-items-center py-4 bg-emerald-600">
    

    
<main class="form-signin flex justify-center w-100">
  <form action="" method="post" class="w-50">
    <h1 class=" mb-3 justify-center font-semibold flex text-white text-5xl">Sign in</h1>
    <div class="form-floating text-white">
      <input type="text" class="form-control mb-2 bg-zinc-900" name="nama" id="floatingInput" placeholder="Nama">
      <label for="floatingInput">Nama</label>
    </div>
    <div class="form-floating text-white">
      <input type="text" class="form-control mb-2 bg-zinc-900" name="username" id="floatingPassword" placeholder="Username">
      <label for="floatingPassword">Username</label>
    </div>
    <div class="form-floating text-white">
      <input type="password" class="form-control mb-2 bg-zinc-900" name="password" id="floatingInput " placeholder="Password">
      <label for="floatingPassword">Password</label>
    </div>
    <div class="form-floating text-white">
      <input type="text" class="form-control mb-2 bg-zinc-900" name="no_telepon" id="floatingInput " placeholder="No telepon">
      <label for="floatingPassword">No telepon</label>
    </div>
    <div class="form-floating text-white">
      <input type="text" class="form-control mb-2 bg-zinc-900" name="alamat" id="floatingInput " placeholder="Alamat">
      <label for="floatingPassword">Alamat</label>
    </div>

    <button class="bg-zinc-700 hover:bg-zinc-800 btn w-100 py-2 mb-2" type="submit" name="submit">Sign in</button>
    <footer class="py-5 ">
        <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2024</p></div>
        </footer>
     </form>
    </form>
</main>
<script src="./assets/dist/js/bootstrap.bundle.min.js"></script>

    </body>
</html>