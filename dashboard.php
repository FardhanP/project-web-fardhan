<?php
// include 'koneksi.php';


// session_start();
// if(!isset($_SESSION['admin'])){
//   header("location: login.php");
// }




  // if ($simpan){
  //     echo "<script> altert ('Data Berhasil Berubah')</script>";
  //   header("Location: dashboard.php");
  // }


// edit
// if(isset($_GET['aksi'])){
//   $aksi = $_GET['aksi'];
// }
// else{
//   $aksi="";
// }

// if($aksi == "edit"){
//   $id = $_GET['id'];
//   $hasil = mysqli_query(
//     $koneksi,"SELECT * FROM produk WHERE id='$id'");
//    while($data = mysqli_fetch_array($hasil)){
//     $nama = $data ['nama'];
//     $harga = $data ['harga'];
//     $stok = $data ['stok'];
//     $foto = $data ['foto'];
//     $jenis = $data ['jenis'];
//     $deskripsi = $data ['deskripsi'];
 
//   } 
// }

// if (isset($_POST['simpan'])){
// if ($aksi== "edit"){
//   $nama = $_POST ['nama'];
//   $harga = $_POST ['harga'];
//   $stok = $_POST ['stok'];
//   $jenis = $_POST ['jenis'];
//   $deskripsi = $_POST ['deskripsi'];
//   $foto = $_FILES ['foto'] ['name'];
  
//   if (!empty ($foto)){
    
//     $path ="image/" . $foto;
//     $file_tmp = $_FILES ['foto'] ['tmp_name']; 
//     move_uploaded_file($file_tmp, $path);
//   }
//    else {
//     $foto =$_POST ['foto'];
//   }
//   $simpan = mysqli_query($koneksi, "UPDATE produk SET nama='$nama', harga='$harga', stok='$stok' foto='$foto', jenis='$jenis', deskripsi='$deskripsi' WHERE id='$id'");
// }
// else{
//   $nama = $_POST['nama'];
//   $harga = $_POST['harga'];
//   $stok = $_POST['stok'];
//   $foto =   $_FILES ['foto']['name'];
//   $file_tmp = $_FILES ['foto']['tmp_name'];
//   move_uploaded_file($file_tmp, 'image/' .$foto);
//   $jenis = $_POST['jenis'];
//   $deskripsi = $_POST['deskripsi'];
  
//   $simpan = mysqli_query($koneksi, "INSERT INTO produk (nama,harga,stok,foto,jenis,deskripsi)
//    values('$nama','$harga','$stok','$foto','$jenis','$deskripsi')");
// }
// }

  include 'koneksi.php';
  session_start();
  if (!isset($_SESSION['admin'])) {
    header('location: login.php');
  }
  
  if (isset($_GET['aksi'])) {
    $aksi = $_GET['aksi'];
  } else {
    $aksi = "";
  }
  if ($aksi == "edit") {
    $id = $_GET['id'];
    $simpan = mysqli_query(
      $koneksi,
      "SELECT * FROM produk where id='$id'"
    );
    while ($produk = mysqli_fetch_array($simpan)){
      $nama = $produk['nama'];
      $harga = $produk['harga'];
      $stok = $produk['stok'];
      $foto = $produk['foto'];
      $jenis = $produk['jenis'];
      $deskripsi = $produk['deskripsi'];
    }
  }

  if (isset($_POST['simpan'])) {
    if($aksi == "edit"){
      $nama=$_POST['nama'];
      $harga=$_POST['harga'];
      $stok=$_POST['stok'];
      $deskripsi=$_POST['deskripsi'];
      $jenis=$_POST['jenis']; 
  
  
      if(!empty ($_FILES['foto']['name'])){
        $foto=$_FILES['foto']['name'];
      $file_tmp=$_FILES['foto']['tmp_name'];
  
      }else{
        $foto=$_POST['foto'];
      }

      $simpan = mysqli_query($koneksi, 
      "UPDATE produk SET nama='$nama
      ', harga='$harga', stok='$stok', foto='$foto', jenis='$jenis', deskripsi='$deskripsi' WHERE id='$id'");
     header('location: dashboard.php');
    }else{

      $nama=$_POST['nama'];
      $harga=$_POST['harga'];
      $stok=$_POST['stok'];
      $deskripsi=$_POST['deskripsi'];
      $jenis=$_POST['jenis'];
      $foto=$_FILES['foto']['name'];
      $path = "image/". $foto;
      $file_tmp=$_FILES['foto']['tmp_name'];
      move_uploaded_file($file_tmp, $path);
      $simpan = mysqli_query($koneksi, "INSERT INTO produk(nama,harga,stok,foto,jenis,deskripsi)
       values('$nama','$harga','$stok','$foto','$jenis','$deskripsi')");
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
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/dashboard/">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">

<link href="./assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        width: 100%;
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }

      .btn-bd-primary {
        --bd-violet-bg: #712cf9;
        --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

        --bs-btn-font-weight: 600;
        --bs-btn-color: var(--bs-white);
        --bs-btn-bg: var(--bd-violet-bg);
        --bs-btn-border-color: var(--bd-violet-bg);
        --bs-btn-hover-color: var(--bs-white);
        --bs-btn-hover-bg: #6528e0;
        --bs-btn-hover-border-color: #6528e0;
        --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
        --bs-btn-active-color: var(--bs-btn-hover-color);
        --bs-btn-active-bg: #5a23c8;
        --bs-btn-active-border-color: #5a23c8;
      }

      .bd-mode-toggle {
        z-index: 1500;
      }

      .bd-mode-toggle .dropdown-menu .active .bi {
        display: block !important;
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">
  </head>
  <body>

  <header class="navbar sticky-top bg-emerald-600 flex-md-nowrap p-0 " >
   <h1 class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6 text-white text-3xl font-bold" href="#">Helmstore.</h1>
    </header>
  <ul class="navbar-nav flex-row d-md-none">
    <li class="nav-item text-nowrap">
      <button class="nav-link px-3 text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSearch" aria-controls="navbarSearch" aria-expanded="false" aria-label="Toggle search">
        <svg class="bi"><use xlink:href="#search"/></svg>
      </button>
    </li>
    <li class="nav-item text-nowrap">
      <button class="nav-link px-3 text-white" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <svg class="bi"><use xlink:href="#list"/></svg>
      </button>
    </li>
  </ul>

  <div id="navbarSearch" class="navbar-search w-100 collapse">
    <input class="form-control w-100 rounded-0 border-0" type="text" placeholder="Search" aria-label="Search">
  </div>
</nav>

        <!-- SIDEBAR -->
<div class="container-fluid">
  <div class="row">
    <div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary">
      <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="sidebarMenuLabel">Company name</h5>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2 active" aria-current="page" href="#">
                <svg class="bi"><use xlink:href="#house-fill"/></svg>
                Dashboard
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="#">
                <svg class="bi"><use xlink:href="#file-earmark"/></svg>
                Orders
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="home.php">
                <svg class="bi"><use xlink:href="#cart"/></svg>
                Products
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="#">
                <svg class="bi"><use xlink:href="#people"/></svg>
                Customers
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="#">
                <svg class="bi"><use xlink:href="#graph-up"/></svg>
                Reports
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="#">
                <svg class="bi"><use xlink:href="#puzzle"/></svg>
                Integrations
              </a>
            </li>
          </ul>

          <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-body-secondary text-uppercase">
            <span>Saved reports</span>
            <a class="link-secondary" href="#" aria-label="Add a new report">
              <svg class="bi"><use xlink:href="#plus-circle"/></svg>
            </a>
          </h6>
          <ul class="nav flex-column mb-auto">
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="#">
                <svg class="bi"><use xlink:href="#file-earmark-text"/></svg>
                Current month
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="#">
                <svg class="bi"><use xlink:href="#file-earmark-text"/></svg>
                Last quarter
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="#">
                <svg class="bi"><use xlink:href="#file-earmark-text"/></svg>
                Social engagement
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="#">
                <svg class="bi"><use xlink:href="#file-earmark-text"/></svg>
                Year-end sale
              </a>
            </li>
          </ul>

          <hr class="my-3">

          <ul class="nav flex-column mb-auto">
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="datapelanggan.php">
                <svg class="bi"><use xlink:href="#gear-wide-connected"/></svg>
                Data pelanggan
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="logout.php">
                <svg class="bi"><use xlink:href="#door-closed"/></svg>
                Logout
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>



    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">
            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
          </div>
          <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle d-flex align-items-center gap-1">
            <svg class="bi"><use xlink:href="#calendar3"/></svg>
            This week
          </button>
        </div>
      </div> 
      
          <!-- FORM -->
      <form action="" method="POST"  enctype="multipart/form-data">
      <div class="col-12 ">
        <label for="disabledTextInput" class="form-label">Nama</label>
              <div class="input-group has-validation">
                <input type="text" class="form-control" name="nama" value="<?= @$nama ?>" id="disabledTextInput" placeholder="Nama" required>
                
                <div class="col-12">
                  <label for="disabledTextInput" class="form-label">Harga</label>
                  <div class="input-group has-validation">
                    <span class="input-group-text">Rp.</span>
                    <input type="text" class="form-control" value="<?= @$harga ?>" name="harga" id="disabledTextInput" placeholder="Harga" required>
                    
                    <div class="col-12">
                      <label for="disabledTextInput" class="form-label">Stok</label>
                     <input type="text" class="form-control" value="<?= @$stok ?>" name="stok" id="disabledTextInput" placeholder="Stok" required> 
                    </div>
                    
                    <div class="col-12">
                      <label for="disabledTextInput" class="form-label"> Foto</label>
                      <input type="file" name="foto" value="<?= @$foto ?>" class="form-control" id="inputGroupFile02">
                    </div>
                    <div class="col-12">
                      <label for="disabledSelect" class="form-label">Jenis</label>
                      <select value="<?= @$jenis ?>"  class="form-select" id="disabledSelect" name="jenis" required>
                        <option value="1" disable selected hidden>Jenis helm</option>
                        <option value="Full face helmet">Full face helmet</option>
                        <option value="Open face helmet">Open face helmet</option>
                        <option value="Cross helmet">Cross helmet</option>
                        </select>  
                      
                    </div>
                    <div class="col-12  pb-3">
                      <label for="disabledTextInput" class="form-label">Deskripsi</label>
              <input type="text" class="form-control" value="<?= @$deskripsi ?>" id="disabledTextInput" name="deskripsi" placeholder="Deskripsi" required>              
            </div>

            <button class="w-100 btn btn-primary rounded-lg" name="simpan" type="submit">Simpan</button>
          </form>

            
            <table class="table table-striped table-sm flex items-center  ">
              <thead>
                <tr>
              <th scope="col">No</th>
              <th scope="col">Nama </th>
              <th scope="col">Harga</th>
              <th scope="col">Stok</th>
              <th scope="col">Foto</th>
              <th scope="col">Jenis</th>
              <th scope="col">Deskripsi</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
           $result = mysqli_query(
              $koneksi, "SELECT * FROM produk"
           );
           
           $id = 1;
           while ($produk = mysqli_fetch_assoc($result)){
            echo "<tr>";
            echo "<td>" . $id++ ."</td>";
            echo "<td>" . $produk['nama']. "</td>";
            echo "<td><p>Rp." .  $produk['harga']."</p></td>";
            echo "<td>" . $produk['stok']."</td>";
            echo "<td>";
            echo "<img src='image/" . htmlspecialchars($produk['foto']) . "' alt='" . htmlspecialchars($produk['nama']) ."' style='width:200px; height:auto;'/>";
            echo "<td>" . $produk['jenis']."</td>";
             echo "<td>" . $produk['deskripsi']."</td>";
            echo "</td>";
            echo "<td>";
            
            echo "<div class='flex flex-warp'>";
            echo "<a href='dashboard.php?aksi=edit&id=" . $produk['id']. "' class='btn btn-primary btn-sm px-2 py-2'>";
            echo "<h1>Edit</h1>";
            echo "</a>";
            echo "<a href='hapus.php?id=" . $produk['id']. "' class='btn btn-danger btn-sm px-2 py-2 ml-1'>";
            echo "<h1>Hapus</h1>";
            echo "</a>";
            echo "</div>";
            echo "</td>";
            echo"</tr>";
           }

          ?>
          </tbody>
        </table>
      </div>
    </main>
  </div>
</div>
<script src="./assets/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.3.2/dist/chart.umd.js" integrity="sha384-eI7PSr3L1XLISH8JdDII5YN/njoSsxfbrkCTnJrzXt+ENP5MOVBxD+l6sEG4zoLp" crossorigin="anonymous"></script><script src="dashboard.js"></script>
  </body>
</html>