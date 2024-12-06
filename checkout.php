<?php
session_start();

// Cek apakah $_SESSION['keranjang'] sudah didefinisikan
if (!isset($_SESSION['keranjang']) || !is_array($_SESSION['keranjang'])) {
    $_SESSION['keranjang'] = array(); // Inisialisasi dengan array kosong jika belum ada
}

$koneksi = new mysqli("localhost", "root", "", "db_toko");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
<meta name="description" content="" />
<meta name="author" content="" />
<title>Keranjang Belanja</title>
<script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet"
href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
<!-- Favicon-->
<link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
<!-- Bootstrap icons-->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
<!-- Core theme CSS (includes Bootstrap)-->
<link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body class="font-[poppins]">
<nav class="flex fixed justify-between items-center z-20 bg-emerald-600 p-4 h-16 w-full text-white z-index-20 ">
        <div class="font-semibold text-3xl pl-6">
        <a href="home.php"><h1>Helmstore.</h1></a>
        </div>
        <div class="flex flex-row p-2 ">
        <a href="keranjang.php">
          <i class='bx bxs-cart pr-2 text-3xl'></i>
        </a>
        <a href="profil.php">
          <i class='bx bxs-user-circle text-3xl' style='color:#ffffff' ></i>
        </a>
        </div>
        </nav>


    <section class="konten py-5">
        <div class="container">
        <h1 class="mt-6 font-semibold text-4xl flex justify-center mb-2">Checkout</h1>
            <div class="table-responsive">
                <table class="table table-bordered text-center align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Produk</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th>SubHarga</th>

                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                    $no = 1; 
                    $totalBelanja = 0; 
                    if (isset($_SESSION['keranjang']) && is_array($_SESSION['keranjang'])): 
                        foreach ($_SESSION['keranjang'] as $id => $jumlah) {
                            $ambil = $koneksi->query("SELECT * FROM produk WHERE id='$id'");
                            $pecah = $ambil->fetch_assoc();
                            if ($pecah) {
                                $harga = isset($pecah['harga']) ? $pecah['harga'] : 0;
                                $subHarga = $harga * $jumlah;
                                $totalBelanja += $subHarga;

                                // Pastikan foto adalah string dan bukan array
                                $foto = isset($pecah['foto']) ? $pecah['foto'] : '';
                            ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <img src="image/<?php echo htmlspecialchars($pecah['foto']); ?>" alt="" class="size-32 mr-5 rounded">
                                    <span><?php echo htmlspecialchars($pecah['nama']); ?></span>
                                </div>
                            </td>
                            <td>Rp. <?php echo number_format($pecah['harga']); ?></td>
                            <td><?php echo htmlspecialchars($jumlah); ?></td>
                            <td>Rp. <?php echo is_numeric($pecah['harga']) && is_numeric($jumlah) ? number_format($pecah['harga'] * $jumlah) : '0'; ?></td>
                        
                        </tr>
                        <?php 
                            }
                        }
                    else: 
                    ?>
                    <tr>
                        <td colspan="5">Keranjang kosong</td>
                    </tr>
                    <?php endif; ?>
                    </tbody>
                    <tfoot>
                    <tr>
                        <th colspan="4">Total Belanja</th>
                        <th>Rp. <?php echo number_format($totalBelanja); ?></th>
                    </tr>
                </tfoot>
                </table>
            </div>

            <div class="d-flex justify-content-between">
                <a href="keranjang.php" class="btn btn-outline-secondary">
                    <i class="fa fa-arrow-left"></i> Lanjutkan belanja
                </a>
                <a href="cetak.php" class="btn btn-primary">
                    Beli <i class="fa fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </section>

    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
</body>
</html>