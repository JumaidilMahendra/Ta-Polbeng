<!-- <!DOCTYPE html>
<html>
<head>
    <title>Halaman Jasa</title>
    <link rel="stylesheet" type="text/css" href="css/detail_jasa.css?<?php echo time(); ?>"/>
</head>
<body>
<p>Jasa Kami</p>
    <div class="container-card">
        <?php
        include_once("koneksi.php");

        // Query untuk mengambil data jasa
        $sql = "SELECT * FROM jasa";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            // Menampilkan data jasa
            while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <div class="card">
        <a href="detail_jasa.php?id=<?php echo $row['id_jasa']; ?>">
            <img src="img/<?php echo $row['gambar']; ?>" alt="produk 1">
            <div class="card-content">
                <h2><?php echo $row['nama']; ?></h2>
                <p class="price"><?php echo $row['jenis']; ?></p>
                <p><?php echo $row['harga']; ?></p>
                <p><?php echo $row['deskripsi']; ?></p>
            </div>
        </div>
        <?php
            }
        } else {
            echo "<p>Tidak ada data jasa.</p>";
        }

        mysqli_close($conn);
        ?>
    </div>
    <?php include_once("footer.php") ?>
</body>
</html>


 -->