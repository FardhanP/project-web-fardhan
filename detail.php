<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Detail</title>
        <!-- Favicon-->
        <!-- <link rel="icon" type="image/x-icon" href="assets/favicon.ico" /> -->
        <!-- Bootstrap icons-->
        <link href="./https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="./https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    </head>
    <body class="font-[poppins] bg-emerald-600">
    
  
        <main class="container mx-auto my-8 p-4 bg-white shadow-lg rounded-lg">

            <div class="grid grid-cols-1cmd:grid-cols-2 gap-8 w-full min-h-96 justify-center items-center">
                <?php
                include('koneksi.php');

                $id = $_GET['id'];

                $query = "SELECT * FROM produk where id=$id";
                $hasil = mysqli_query($koneksi, $query);

                while($h = mysqli_fetch_array($hasil)){

                ?>

                <div class="flex flex-row">
                    <img src="image/<?php echo $h['foto']?>" class="w-56 mr-36" alt="nama_barang">
                    

                <div>
                    <form action="keranjang.php?id=<?= $h['id'] ?>" method="post">
                        <h2 class="text-3x1 font-semibold mb-4"><?php echo $h['nama']?></h2>
                        <p class="font-semibold  mb-4"><?php echo $h['deskripsi']?></ p>
                        <p>Rp. <?php echo number_format ($h['harga'])?></p>

                        <input type="number" class="border border-black border-2 w-44 h-13 px-2 py-1 rounded-lg text-slate-900 font-bold text-x1 mb-4" name="jumlah" value="1">
                        <input type="hidden" name="nama" value="<?php echo $h['nama']?>">
                        <input type="hidden" name="harga" value="<?php echo $h['harga']?>">
                        <input type="hidden" name="foto" value="<?php echo $h['foto']?>">
                        <div class="flex space-x-4">
                            <input type="submit" name="add" value="add to cart" class="bg-zinc-700 text-white py-2 px-4 rounded-lg hover:bg-zinc-800 ">
                        </div>
                    </div>
                    </form>
                </div>
                <?php } ?>
            </div>
        </main>


        <footer class="py-5 bg-dark ">
        <div class="container"><p class="text-center text-white">Copyright &copy; Your Website 2024</p></div>
        </footer>    
        <script src="./https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
</body>
</html>