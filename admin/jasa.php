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
    <?php include_once("sidebar.php") ?>
    <?php
    include_once("../koneksi.php");

    function getJasa()
    {
        global $conn;
        $sql = "SELECT * FROM jasa";
        $result = mysqli_query($conn, $sql);
        return $result;
    }

    // Fungsi untuk menghapus data jasa dari database
    function hapusJasa($id)
    {
        global $conn;
        $sql = "DELETE FROM jasa WHERE id_jasa = '$id'";
        $result = mysqli_query($conn, $sql);
        return $result;
    }

    // Proses hapus data jasa
    if (isset($_GET['hapus'])) {
        $id = $_GET['hapus'];

        // Panggil fungsi untuk hapus data jasa
        hapusJasa($id);

        // Refresh halaman setelah hapus data
        header("Location: jasa.php");
        exit();
    }

    // Panggil fungsi untuk mendapatkan data jasa
    $dataJasa = getJasa();

    // Tutup koneksi database
    mysqli_close($conn);
    ?>

    <title>Tabel Jasa</title>
    <link rel="stylesheet" href="../css/admin_jasa.css?<?php echo time();?>/">



</head>

<body>
    <div class="container">

        <!-- Tabel jasa -->
        <h1>Data Jasa</h1>
        <table>
            <tr>
                <th>No</th>
                <th>Gambar</th>
                <th>Nama</th>
                <th>Harga</th>
                <th>Deskripsi</th>
                <th>aksi</th>
            </tr>
            <?php
            $no = 1;
            // Loop untuk menampilkan data jasa
            while ($row = mysqli_fetch_assoc($dataJasa)) {
                echo "<tr>";
                echo "<td>" . $no . "</td>";
                echo "<td><img src='../img/" . $row['gambar'] . "' alt='Gambar Jasa' width='100px' height='80px'></td>";
                echo "<td>" . $row['nama'] . "</td>";
                echo "<td>" . $row['harga'] . "</td>";
                echo "<td>" . $row['deskripsi'] . "</td>";
                echo "<td class='aksi'>";
                echo "<a href='jasa.php?hapus=" . $row['id_jasa'] . "'>Hapus</a>";
                echo "<a href='edit_jasa.php?id_jasa=" . $row['id_jasa'] . "'>Edit</a>";
                echo "</td>";
                echo "</tr>";
                $no++;
            }
            ?>
        </table>
        <a href="tambah_jasa.php" class="tombol-tambah">Tambah Data</a>
    </div>
</body>

</html>
