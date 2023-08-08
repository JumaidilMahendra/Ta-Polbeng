<!DOCTYPE html>
<html>

<head>
    <title>Halaman Index</title>
    <link rel="stylesheet" href="css/index.css?<?php echo time(); ?>/">
    <link rel="stylesheet" href="css/pro.css?<?php echo time(); ?>/">
</head>


<body>
    <?php include_once("navbar.php") ?>
    
    <div class="content">
        <h1>Selamat Datang di Hijrah Petshop</h1>
        <img src="https://fanicat.com/wp-content/uploads/2019/11/a-gambar-kucing-scottish-fold-imut.jpg" class="ex" alt="Gambar Ilustrasi">
    </div>

    <?php
    include_once("koneksi.php");

    // Query to get categories
    $sql = "SELECT * FROM kategori";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // Menampilkan data jasa
        echo '<div class="container">';
        echo '<div class="row">';
        while ($row = mysqli_fetch_assoc($result)) {
    ?>
            <a href="<?php echo $row['nama']; ?>.php">
                <div class="col" style="max-width: 250px; max-height: 350px;">
                    <div id="myhome">
                        <img style="min-width:250px; max-width: 250px; min-height: 150px; max-height: 150px; margin-bottom: 1rem;" class='tokenImage' src="img/<?php echo $row['gambar']; ?>" alt="<?php echo $row['nama']; ?>">
                        <div class="mycard">
                            <h2 class="card-title" style="position: absolute; top:30%; color: white;"><?php echo ucfirst ($row['nama']); ?></h2>
                            <div class='tokenInfo'>
                                <div class="price" style=" margin-bottom: 15px;">
                                    <a><?php echo $row['deskripsi']; ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
    <?php
        }
    } else {
        echo "<p>No categories found.</p>";
    }

    mysqli_close($conn);
    ?>
    </div>
    <?php include_once("footer.php") ?>
    <script src="script.js"></script>
</body>

</html>