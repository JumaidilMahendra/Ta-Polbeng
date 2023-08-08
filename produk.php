<!DOCTYPE html>
<html>
<head>
    <title>Halaman Produk</title>
    <link rel="stylesheet" href="css/produk.css?<?php echo time();?>/">
</head>
<body>
    <?php include_once("navbar.php") ?>
    <div class="dropdown">
        <button onclick="myFunction()" class="dropbtn">Dropdown</button>
            <div id="myDropdown" class="dropdown-content">
                <input type="text" placeholder="Search.." id="myInput" onkeyup="filterFunction()">
                <a href="#about">About</a>
                <a href="#base">Base</a>
                <a href="#blog">Blog</a>
            </div>
        </div>
    <p>Produk Kami</p>
    <div class="container-card">
        <?php
        include_once("koneksi.php");
        
        // Query untuk mengambil data produk
        $sql = "SELECT * FROM produkk";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            // Menampilkan data produk
            while ($row = mysqli_fetch_assoc($result)) {
        ?>
        
            <div class="card">
                <img src="img/<?php echo $row['gambar']; ?>" alt="produk 1">
                <div class="card-content">
                    <h2><?php echo $row['nama']; ?></h2>
                </div>
                <a style="text-decoration: none;" href="detail_produk.php?id=<?php echo $row['id_produk']; ?>">Lihat Detail</a>
            </div>
        <?php
            }
        } else {
            echo "<p>Tidak ada data produk.</p>";
        }

        mysqli_close($conn);
        ?>
    </div>
    <?php include_once("footer.php")?>
</body>
</html>
