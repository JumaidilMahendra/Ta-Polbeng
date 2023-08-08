<!DOCTYPE html>
<html>
<head>
    <title>Edit Data jasa</title>
    <link rel="stylesheet" href="../css/admin_edit_produk.css">
</head>
<body>
    <?php
    include_once ('../koneksi.php');

    if (isset($_GET['id_jasa'])) {
        $id_jasa = $_GET['id_jasa'];
        $sql = "SELECT * FROM jasa WHERE id_jasa = $id_jasa";
        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $id_jasa = $row['id_jasa'];
            $nama = $row['nama'];
            $harga = $row['harga'];
            $deskripsi = $row['deskripsi'];
            $gambar = $row['gambar'];
        } else {
            echo "Data produk tidak ditemukan.";
            exit();
        }
    } else {
        echo "ID produk tidak diberikan.";
        exit();
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nama = $_POST['nama'];
        $harga = $_POST['harga'];
        $deskripsi = $_POST['deskripsi'];

        // Proses upload gambar jika ada perubahan gambar
        if ($_FILES['gambar']['name'] != '') {
            $target_dir = "../img/"; // Lokasi folder untuk menyimpan gambar
            $target_file = $target_dir . basename($_FILES["gambar"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

            // ... kode validasi dan proses upload gambar seperti sebelumnya ...
            // Proses upload gambar ke folder tujuan
            if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file)) {
                echo "Gambar berhasil diupload.";
                $gambar = basename($_FILES["gambar"]["name"]); // Update nama gambar baru ke variabel $gambar
            } else {
                die("Terjadi kesalahan saat mengupload gambar.");
            }
        }

        // Melakukan sanitasi pada data yang akan disimpan ke database untuk menghindari SQL Injection
        $nama = mysqli_real_escape_string($conn, $nama);
        $harga = mysqli_real_escape_string($conn, $harga);
        $deskripsi = mysqli_real_escape_string($conn, $deskripsi);

        // Simpan data ke database
        $sql = "UPDATE jasa SET nama='$nama', harga='$harga', deskripsi='$deskripsi', gambar='$gambar' WHERE id_jasa='$id_jasa'";
        if ($conn->query($sql) === TRUE) {
            // Notifikasi berhasil diedit
            echo "<script>alert('Data jasa berhasil diperbarui.');</script>";
            // Redirect ke halaman tampilan data jasa setelah data berhasil diupdate
            header("Location: jasa.php");
            exit(); // Penting untuk memastikan redirect berjalan dengan baik
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    $conn->close();
    ?>
    <div class="container">
    <h2>Edit Data jasa</h2>
    <form method="post" enctype="multipart/form-data">
        <input type="hidden" name="id_jasa" value="<?php echo $id_jasa; ?>">
        <label for="nama">Nama jasa:</label><br>
        <input type="text" name="nama" value="<?php echo $nama; ?>"><br><br>
        <label for="harga">Harga:</label><br>
        <input type="number" name="harga" value="<?php echo $harga; ?>"><br><br>
        <label for="deskripsi">Deskripsi:</label><br>
        <textarea name="deskripsi"><?php echo $deskripsi; ?></textarea><br><br>
        <label for="gambar">Gambar:</label><br>
        <input type="file" name="gambar"><br><br>
        <input type="submit" value="Simpan">
    </form>
    </div>
</body>
</html>
