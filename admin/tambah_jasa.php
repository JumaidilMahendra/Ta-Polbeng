<?php
include_once("../koneksi.php");

// Fungsi untuk menambahkan data jasa ke database
function tambahJasa($gambar, $nama, $harga, $deskripsi)
{
    global $conn;
    $gambar = mysqli_real_escape_string($conn, $gambar);
    $nama = mysqli_real_escape_string($conn, $nama);
    $harga = mysqli_real_escape_string($conn, $harga);
    $deskripsi = mysqli_real_escape_string($conn, $deskripsi);

    $sql = "INSERT INTO jasa (gambar, nama, harga, deskripsi) VALUES ('$gambar', '$nama', '$harga', '$deskripsi')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        // Jika data berhasil disimpan, tampilkan pesan sukses
        echo "Data jasa berhasil ditambahkan.";
    } else {
        // Jika terjadi kesalahan, tampilkan pesan kesalahan
        echo "Error: " . mysqli_error($conn);
    }

    return $result;
}

// Proses tambah data jasa
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $deskripsi = $_POST['deskripsi'];

    // Upload gambar
    $gambar = $_FILES['gambar']['name'];
    $gambar_tmp = $_FILES['gambar']['tmp_name'];
    $gambar_path = "../img/" . $gambar;

    // Pastikan direktori untuk menyimpan gambar sudah ada
    if (!is_dir("../img/")) {
        mkdir("../img/");
    }

    // Panggil fungsi untuk tambah data jasa
    if (tambahJasa($gambar, $nama, $harga, $deskripsi)) {
        // Pindahkan gambar dari temporary location ke direktori yang ditentukan
        move_uploaded_file($gambar_tmp, $gambar_path);

        // Setelah data berhasil disimpan, arahkan kembali ke halaman jasa.php
        header("Location: jasa.php");
        exit();
    } else {
        echo "Gagal menambahkan data jasa.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Jasa</title>
    <link rel="stylesheet" type="text/css" href="../css/admin_tambah_jasa.css">
</head>
<body>
    <div class="container">
    <div class="form-wrapper">
        <h2>Tambah Jasa</h2>
        <form method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" id="nama" name="nama" required>
            </div>
            <div class="form-group">
                <label for="harga">Harga:</label>
                <input type="number" id="harga" name="harga" required>
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
                <button type="submit">Tambah Jasa</button>
            </div>
        </form>
    </div>
    </div>
</body>
</html>
