<!DOCTYPE html>
<html>

<head>
    <title>Detail Produk</title>
    <link rel="stylesheet" href="css/detail_produk.css?<?php echo time(); ?>" />
</head>

<body>
    <?php
    // Koneksi ke database
    include_once("koneksi.php");
    include_once("navbar.php");
    // Mendapatkan ID produk dari parameter URL
    if (isset($_GET['id'])) {
        $id_Produk = $_GET['id'];

        // Query untuk mendapatkan data produk dari database
        $sql = "SELECT * FROM produkk WHERE id_produk = $id_Produk";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $produk = mysqli_fetch_assoc($result);
    ?>
            <p class="judul">Detail Produk</p>
            <!-- Menampilkan detail jasa -->
            <div class="card">
                <div class="gambar"><img src="img/<?php echo $produk['gambar']; ?>" alt="produk 1"></div>
                <div class="card-content">
                    <h2><?php echo $produk['nama']; ?></h2>
                    <p><?php echo $produk['harga']; ?></p>
                    <p><?php echo $produk['deskripsi']; ?></p>
                    <a href="produk.php?id_kategori=" style="width: 5rem;" class="btn">kembali</a>
                </div>
            </div>
    <?php
        } else {
            echo "produk tidak ditemukan.";
        }
    } else {
        echo "ID produk tidak tersedia.";
    }

    mysqli_close($conn);
    ?>
</body>

</html>