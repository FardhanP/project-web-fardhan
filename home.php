<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Home</title>
    <script src="https://cdn.tailwindcss.com"></script>
        <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<link rel="stylesheet"
href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">

</head>
<body class="font-[poppins]">
<nav class="flex fixed justify-between items-center z-20 bg-emerald-600 p-4 h-16 w-full text-white z-index-20 ">         

        <div class="font-semibold text-3xl pl-6">
        <h1>Helmstore.</h1>
        </div>

        <div class="flex flex-row p-2 ">
        <a href="keranjang.php"> <i class='bx bxs-cart pr-2 text-3xl'></i></a>

        <a href="profil.php"><i class='bx bxs-user-circle text-3xl' style='color:#ffffff' ></i> </a>
        </div>
        </nav>
        
    <div id="myCarousel" class="carousel slide mb-6" data-bs-ride="carousel">
    <div class="carousel-inner ">
      <div class="carousel-item active">
        <img class="w-full" src="https://www.araihelmet.eu/storage/uploads/carousel-item/363/resize.jpg?v=2023-11-29-131802" alt="">
        </div>
      </div>
    </div>
 </div>
<form action="" class="flex justify-center py-2 p ">
 <div class="grid grid-cols-7  flex items-center">
   <img class="pr-3 ml-2"src="image/logoarai.png" alt="">
   <img class="pr-3 "src="image/logoshoei.png" alt="">
   <img class="pr-3 "src="image/logorsv.jpg" alt="">
   <img class="pr-3 "src="image/logoagv.png" alt="">
  <img class="pr-3 "src="image/logonhk.png" alt="">
  <img class="pr-3 "src="image/logogm.jpg" alt="">
  <img class="pr-3 "src="image/logokyt.png" alt="">
 </div>
</form>
  <?php
  include 'koneksi.php';
  $query = "SELECT * FROM produk";
  $hasil = mysqli_query ($koneksi, $query);
  while ($data = mysqli_fetch_array ($hasil)){
  ?>
       
  <form class=" grid grid-cols-5 gap-y-8">
          <div class="card shadow-sm border-sm p-2 ml-4 max-w-60 min-h-full gap-y-2 ">
            <div class="">
              <img src="image/<?php echo $data['foto']?>" alt="" class="h-full w-full ">
            </div>
            <h1 class="text-black text-xl font-semibold pl-2"><?php echo $data['nama'] ?></h1>
            <p class="text-black pl-2">Rp.<?php echo number_format( $data['harga'] )?></p>
            <div class="">
              <a href="detail.php?id=<?= $data['id'] ?>" type="button" class="btn text-black btn-sm rounded-md btn-outline-secondary pl-2">Detail</a>
            </div>
          </div>


          
<?php } ?>

  </form>
  <div class="container py-5"><p class="m-0 text-center text-black">Copyright &copy; Your Website 2024</p></div>
</body>
</html>