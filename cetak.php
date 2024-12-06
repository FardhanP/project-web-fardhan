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
<link rel="stylesheet"
href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">

</head>
<body class="font-[poppins] bg-emerald-600 p-10">
<?php
include "koneksi.php";
    $id = $_GET['id'];
    
    $trans = "SELECT * FROM tb_detail
     INNER JOIN tb_transaksi on tb_detail.id_transaksi = tb_transaksi.id_transaksi
    where tb_detail.id_transaksi='$id'";
    $query = mysqli_query($koneksi, $trans);
    $data = mysqli_fetch_array($query);

    $res = "SELECT * FROM tb_transaksi
     INNER JOIN tb_user on tb_transaksi.id_pelanggan = tb_user.id
    where tb_transaksi.id_transaksi='$id'";
    $query = mysqli_query($koneksi, $res);
    $user = mysqli_fetch_array($query);
?>    

<div class="max-w-2xl mx-auto bg-white p-6 shadow-md rounded-lg">
    <h2 class="text-2xl font-bold text-center mb-4">Nota Pembelian</h2>

    <div class="mb-4">
        <p class="text-sm text-black">No Nota: <span class="font-semibold"><?php echo $id ?></span></p>
        <p class="text-sm text-black">No Nota: <span class="font-semibold"><?php echo $user['nama'] ?></span></p>
        <p class="text-sm text-black">Tanggal: <span class="font-semibold"><?php echo $data['tanggal'] ?></span></p>
    </div>

    <table class="min-w-full bg-white">
        <thead>
            <tr>
                <th class="py-2 px-4 bg-gray-200 text-left text-sm font-semibold text-black">Deskripsi</th>
                <th class="py-2 px-4 bg-gray-200 text-right text-sm font-semibold text-black">Kuantitas</th>
                <th class="py-2 px-4 bg-gray-200 text-right text-sm font-semibold text-black">Harga</th>
                <th class="py-2 px-4 bg-gray-200 text-right text-sm font-semibold text-black">Total</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $total = 0;
            $prod = "SELECT * FROM tb_detail INNER JOIN produk on tb_detail.id_produk = produk.id 
            where tb_detail.id_transaksi='$id'";
                $query2 = mysqli_query($koneksi, $prod);
                while ($row = mysqli_fetch_array ($query2)) {
                    $total = $total + ($row['harga'] * $row['jumlah'])
            ?>
            <tr>
                <td class="py-2 px-4 border-b"><?php echo $row ['nama'] ?></td>
                <td class="py-2 px-4 border-b text-right"><?php echo $row ['jumlah'] ?></td>
                <td class="py-2 px-4 border-b text-right"><?php echo number_format($row  ['harga'])  ?></td>
                <td class="py-2 px-4 border-b text-right"><?php echo number_format($row ['harga'] * $row ['jumlah']) ?></td>
            </tr>
            <?php } ?>
        </tbody>
        <tfoot>

        <tr>
            <td colspan="3" class="py-2 px-4 text-right font-semibold ">Total</td>
            <td class="py-2 px-4 text-right font-semibold ">
                    <?php echo number_format($total) ?>
            </td>
        </tr>
        </tfoot>
    </table>
    <div class="mt-6 text-center">
        <button class="text-white bg-zinc-700 px-5 py-1 rounded-md" id="print">Print</button>
        <p class="text-sm py-5 text-black">Terimakasih sudah membeli!</p>
        
    </div>
</div>
 <script>
    document.getElementById("print").addEventListener('click', () => {

        window.print();
    })
 </script>
</body>
</html>