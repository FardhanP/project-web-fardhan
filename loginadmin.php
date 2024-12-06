<?php
include 'koneksi.php';
session_start();
if (isset($_POST['login'])){
  $username = $_POST['username'];
  $password = $_POST['password'];
  $login = mysqli_query(
    $koneksi,
    "SELECT * FROM tb_user where username='$username' and password='$password'"
  );
  if ($data = mysqli_fetch_array($login)){
    //berhasil login
    $_SESSION['username'] = $data ['username'];
    $_SESSION['password'] = $data ['password'];
    header('location: dashboard.php');
  }else{
    //gagal login
    header('loginadmin.php');
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
    <title>Login</title>
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
    

    
<main class="form-signin flex justify-center w-100 m-auto">
  <form action="" method="post">
    <h1 class=" mb-3 justify-center font-semibold flex text-white text-5xl">Login</h1>
    <div class="form-floating text-black">
      <input type="text" class="form-control mb-2 bg-zinc-900" name="username" id="floatingInput" placeholder="Username">
      <label for="floatingInput" class="text-white">Username</label>
    </div>
    <div class="form-floating text-black">
      <input type="password" class="form-control mb-2 bg-zinc-900" name="password" id="floatingPassword" placeholder="Password">
      <label for="floatingPassword" class="text-white">Password</label>
    </div>

    <button class="btn bg-zinc-700 text-white hover:bg-zinc-800 w-100 py-2 mb-2" type="submit" name="login">Login</button>
    <p class="text-white">Tidak punya akun?<a href="signin.php" class="text-blue-400 underline">Sign in</a></p>
    <p class="mt-5 mb-3 text-body-secondary"></p>
    
    <footer class="py-5 ">
        <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2024</p></div>
        </footer>
     </form>
</main>
<script src="./assets/dist/js/bootstrap.bundle.min.js"></script>

    </body>
</html>