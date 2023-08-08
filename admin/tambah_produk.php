<?php
include_once("../koneksi.php");

// Fungsi untuk menambahkan data produk ke database
function tambahProduk($gambar, $nama, $id_kategori , $stok, $harga, $deskripsi)
{
    global $conn;
    $sql = "INSERT INTO produkk (gambar, nama, id_kategori, stok, harga, deskripsi) VALUES ('$gambar', '$nama', '$id_kategori', '$stok', '$harga', '$deskripsi')";
    $result = mysqli_query($conn, $sql);
    return $result;
}

// Proses tambah data produk
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $jenis = $_POST['id_kategori'];
    $stok = $_POST['stok'];
    $harga = $_POST['harga'];
    $deskripsi = $_POST['deskripsi'];

    // Upload gambar
    $gambar = $_FILES['gambar']['name'];
    $gambar_tmp = $_FILES['gambar']['tmp_name'];
    $gambar_path = "img/" . $gambar;
    move_uploaded_file($gambar_tmp, $gambar_path);

    // Panggil fungsi untuk tambah data produk
    tambahProduk($gambar, $nama, $jenis, $stok, $harga, $deskripsi);

    // Refresh halaman setelah tambah data
    header("Location: produk.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Produk</title>
    <link rel="stylesheet" type="text/css" href="../css/admin_tambah_jasa.css">
</head>
<body>
    <div class="container">
    <div class="form-wrapper">
        <h2>Tambah Produk</h2>
        <form method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" id="nama" name="nama" required>
            </div>
            <div class="form-group">
                <label for="id_kategori" style="margin-bottom:10px;">Kategori:</label>
                    <select style="height:30px; border-radius: 5px; margin-bottom:25px; margin-top:15px;"  id="id_kategori" name="id_kategori">
                        <option value="1">Makanan</option>
                        <option value="2">Aksesoris</option>
                        <option value="3">Obat</option>
                        <option value="4">jasa</option>
                    </select>
            </div>
            <div class="form-group">
                <label for="harga">Harga:</label>
                <input type="number" id="harga" name="harga" required>
            </div>
            <div class="form-group">
                <label for="stok">Stok:</label>
                <input type="number" id="stok" name="stok" >
            </div>
            <div class="form-group">
                <label for="deskripsi">Deskripsi:</label>
                <textarea id="deskripsi" name="deskripsi" required></textarea>
            </div>
            <div class="form-group">
                <label for="gambar">Gambar:</label>
                <input type="file" id="gambar" name="gambar" required>
            </div>
            <div class="form-group">
                <button type="submit">Tambah Produk</button>
            </div>
        </form>
    </div>
    </div>
</body>
</html>
