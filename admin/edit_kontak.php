<!-- <?php
// Koneksi ke database
include_once("../koneksi.php");

// Inisialisasi variabel kontak dengan nilai default
$nomorTlp = '';
$alamat = '';
$facebook = '';
$instagram = '';

// Mendapatkan data kontak dari database
$query = "SELECT * FROM kontak";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    $kontak = mysqli_fetch_assoc($result);

    // Menyimpan data kontak dalam variabel
    $nomorTlp = $kontak['nomor_tlp'];
    $alamat = $kontak['alamat'];
    $facebook = $kontak['facebook'];
    $instagram = $kontak['instagram'];
}

// Proses penyimpanan data kontak
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil nilai dari formulir
    $nomorTlp = $_POST['nomor_tlp'];
    $alamat = $_POST['alamat'];
    $facebook = $_POST['facebook'];
    $instagram = $_POST['instagram'];

    // Perbarui data kontak di database
    $updateQuery = "UPDATE kontak SET nomor_tlp = '$nomorTlp', alamat = '$alamat', facebook = '$facebook', instagram = '$instagram'";
    $updateResult = mysqli_query($conn, $updateQuery);

    if ($updateResult) {
        // Data berhasil disimpan, lakukan pengalihan halaman atau tampilkan pesan sukses
        header("Location: kontak.php");
        exit();
    } else {
        // Terjadi kesalahan saat menyimpan data, tampilkan pesan error
        echo "Error: " . mysqli_error($conn);
    }
}

// Menutup koneksi database
mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit</title>
    <link rel="stylesheet" href="../css/admin-tambah-jasa.css">
</head>
<body>
    <div class="container">
<h2>Edit Kontak</h2>
    <form method="POST">
        <label for="nomor_tlp">Nomor Telepon:</label>
        <input type="text" id="nomor_tlp" name="nomor_tlp" value="<?php echo $nomorTlp; ?>">
        <br>
        <label for="alamat">Alamat:</label>
        <input type="text" id="alamat" name="alamat" value="<?php echo $alamat; ?>">
        <br>
        <label for="facebook">Facebook:</label>
        <input type="text" id="facebook" name="facebook" value="<?php echo $facebook; ?>">
        <br>
        <label for="instagram">Instagram:</label>
        <input type="text" id="instagram" name="instagram" value="<?php echo $instagram; ?>">
        <br>
        <input type="submit" value="Simpan">
    </form>
    </div>
</body>
</html> -->
