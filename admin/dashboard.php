<?php
        include_once("../koneksi.php");
        

// Cek apakah pengguna sudah login
if (!isset($_SESSION["username"])) {
    // Pengguna belum login, redirect ke halaman login
    header("Location: ../login.php");
    exit;
}

// Jika pengguna sudah login, tampilkan halaman dashboard
        
?>
<!DOCTYPE html>
<html>

<head>
    <?php include_once("../koneksi.php"); ?>
    <?php include_once("sidebar.php") ?>
    <title>Dashboard</title>
    <style>
        .card {
            border: 1px solid #ccc;
            border-radius: 4px;
            padding: 10px;
            margin-bottom: 10px;
            width: 300px;
            float: left;
            margin-right: 10px;
            background: #ffffff;
            box-shadow: 0 1px 4px 0px #000000aa;
        }

        h3 {
            margin-left: 250px;
            text-align: center;
            font-size: 30px;
            color: #f2f2f2;
            background-image: linear-gradient( to left,  rgba(4,29,55,1) -0.1%, rgba(2,67,135,1) 25.1%, rgba(28,133,243,1) 49.6%, rgba(115,181,250,1) 74.5%, rgba(214,239,253,1) 99.3% );
        }

        .card-title {
            font-weight: bold;
            font-size: 18px;
        }

        .card-content {
            margin-top: 10px;
        }

        .container {
            display: flex;
            flex-wrap: wrap;
            margin-left: 250px;
        }
    </style>
</head>

<body>
    <h3>Selamat Datang Admin</h3>
    <div class="container">
        <div class="card">
            <h1 class="card-title">Data Produk</h1>
            <div class="card-content">
                <?php
                $query_produk = "SELECT COUNT(*) as total FROM produkk WHERE id_kategori = '1'";
                $result_produk = mysqli_query($conn, $query_produk);
                $row_produk = mysqli_fetch_assoc($result_produk);
                $total_produk = $row_produk['total'];
                ?>
                <p>Total Produk: <?php echo $total_produk; ?></p>
            </div>
        </div>

        <div class="card">
            <h1 class="card-title">Data Jasa</h1>
            <div class="card-content">
                <?php
                $query_jasa = "SELECT COUNT(*) as total FROM produkk WHERE id_kategori = '4'";
                $result_jasa = mysqli_query($conn, $query_jasa);
                $row_jasa = mysqli_fetch_assoc($result_jasa);
                $total_jasa = $row_jasa['total'];
                ?>
                <p>Total Jasa: <?php echo $total_jasa; ?></p>
            </div>
        </div>
        <div class="card">
            <h1 class="card-title">Data Jasa</h1>
            <div class="card-content">
                <?php
                $query_jasa = "SELECT COUNT(*) as total FROM produkk WHERE id_kategori = '2'";
                $result_jasa = mysqli_query($conn, $query_jasa);
                $row_jasa = mysqli_fetch_assoc($result_jasa);
                $total_jasa = $row_jasa['total'];
                ?>
                <p>Total Jasa: <?php echo $total_jasa; ?></p>
            </div>
        </div>
        <div class="card">
            <h1 class="card-title">Data Jasa</h1>
            <div class="card-content">
                <?php
                $query_jasa = "SELECT COUNT(*) as total FROM produkk WHERE id_kategori = '3'";
                $result_jasa = mysqli_query($conn, $query_jasa);
                $row_jasa = mysqli_fetch_assoc($result_jasa);
                $total_jasa = $row_jasa['total'];
                ?>
                <p>Total Jasa: <?php echo $total_jasa; ?></p>
            </div>
        </div>
    </div>
</body>

</html>