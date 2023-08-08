<?php
include_once("../koneksi.php");

// Fungsi untuk mendapatkan data produk dari database beserta nama kategori
function getProduk()
{
    global $conn;
    $sql = "SELECT produkk.*, kategori.nama AS nama_kategori FROM produkk JOIN kategori ON produkk.id_kategori = kategori.id_kategori";
    $result = mysqli_query($conn, $sql);
    return $result;
}

// Fungsi untuk mendapatkan nama kategori berdasarkan id_kategori
function getNamaKategori($id_kategori)
{
    global $conn;
    $sql = "SELECT nama FROM kategori WHERE id_kategori = '$id_kategori'";
    $result = mysqli_query($conn, $sql);

    // Pastikan query berhasil dijalankan sebelum mengambil hasilnya
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        return $row['nama'];
    } else {
        return ''; // Jika tidak ada data kategori dengan id_kategori yang sesuai, kembalikan nilai kosong
    }
}

// Proses hapus data produk
function hapusProduk($id)
{
    global $conn;
    $sql = "DELETE FROM produkk WHERE id_produk = '$id'";
    $result = $conn->query($sql);
    return $result;
}

// Proses hapus data produk
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];

    // Panggil fungsi untuk hapus data produk
    hapusProduk($id);

    // Refresh halaman setelah hapus data
    header("Location: produk.php");
    exit();
}

// Panggil fungsi untuk mendapatkan data produk
$dataProduk = getProduk();

// Tutup koneksi database
mysqli_close($conn);
?>

<!DOCTYPE html>
<html>

<head>
    <?php include_once("sidebar.php") ?>
    <title>Tabel Produk</title>
    <link rel="stylesheet" href="../css/admin_produk.css?<?php echo time(); ?>/">
</head>

<body>

    <div class="container">
        <!-- Tabel produk -->
        <h1>Produk</h1>
        <table>
            <a href="tambah_produk.php" class="tombol-tambah">Tambah Data</a>
            <tr>
                <th>No</th>
                <th>Gambar</th>
                <th>Nama</th>
                <th>Kategori</th>
                <th>Stok</th>
                <th>Harga</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
            </tr>
            <?php
            $no = 0;
            // Loop untuk menampilkan data produk
            while ($row = mysqli_fetch_assoc($dataProduk)) {
                echo "<tr>";
                echo "<td>" . ($no + 1) . "</td>";
                echo "<td><img src='../img/" . $row['gambar'] . "' alt='Gambar Produk' width='100px' height='80px'></td>";
                echo "<td>" . $row['nama'] . "</td>";
                echo "<td>" . $row['nama_kategori'] . "</td>";
                echo "<td>" . $row['stok'] . "</td>";
                echo "<td>" . $row['harga'] . "</td>";
                echo "<td>" . $row['deskripsi'] . "</td>";
                echo "<td class='aksi'>";
                echo "<a href='produk.php?hapus=" . $row['id_produk'] . "'>Hapus</a>";
                echo "<td><a href='edit_produk.php?id_produk=" . $row['id_produk'] . "'>Edit</a></td>";
                echo "</tr>";
                $no++;
            }
            ?>
        </table>

        <div></div>
    </div>
</body>

</html>