<!DOCTYPE html>
<html>

<head>
    <title>Obat</title>
    <link rel="stylesheet" href="css/pro.css?<?php echo time(); ?>/">
    <style>
        h1 {
            margin-top: 100px;
            text-align: center;
            font-weight: bold;
        }
    </style>
</head>


<body>
    <?php include_once("navbar.php") ?>
    <h1>Obat</h1>
    <?php include_once("search.php") ?>

    <?php
    include_once("koneksi.php");
    // Query untuk mengambil data jasa
    $sql = "SELECT * FROM produkk WHERE id_kategori = 3";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // Menampilkan data jasa
        echo '<div class="container">';
        echo '<div class="row">';
        while ($row = mysqli_fetch_assoc($result)) {
    ?>
            <div id="mycard">
                <div class="col">

                    <div class="mycard">
                        <img class='tokenImage' src="img/<?php echo $row['gambar']; ?>" alt="<?php echo $row['nama']; ?>">
                        <hr>
                        <div class="card">
                            <h2 class="card-title"><?php echo $row['nama']; ?></h2>
                            <div class='tokenInfo'>
                                <div class="price">
                                    <p> Harga: Rp.<?php echo $row['harga']; ?>/pcs - Stok: <?php echo $row['stok']; ?></p>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class='creator'>
                            <a href="detail_produk.php?id=<?php echo $row['id_produk']; ?>">
                                <p class="ml-47"><ins>Lihat selengkapnya</ins> ></p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

    <?php
        }
        echo '</div>';
        echo '</div>';
    } else {
        echo "<p>Tidak ada data Obat.</p>";
    }

    mysqli_close($conn);
    ?>
    <?php include_once("footer.php") ?>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js" integrity="sha384-eLq2S02Pq4jMD0LYj9i3cr/8pNvL08N4hnT3JY1rwjiLMpMIH2Xc9YwFZ2t0LdWm" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>