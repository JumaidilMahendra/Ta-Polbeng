<!DOCTYPE html>
<html>
<head>
    <title>Edit Data Produk</title>
    <link rel="stylesheet" href="../css/admin_edit_produk.css">
</head>
<body>
    <?php
    include_once ('../koneksi.php');

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id_produk = $_POST['id_produk'];

        // Retrieve the updated values from the form
        $nama = $_POST['nama'];
        $id_kategori = $_POST['id_kategori'];
        $stok = $_POST['stok'];
        $harga = $_POST['harga'];
        $deskripsi = $_POST['deskripsi'];

        // Check if a new image is uploaded
        if ($_FILES['gambar']['name'] !== '') {
            $gambar = $_FILES['gambar']['name'];
            $gambar_tmp = $_FILES['gambar']['tmp_name'];
            $gambar_path = "../img/" . basename($gambar);
            move_uploaded_file($gambar_tmp, $gambar_path);
        }

        // Update data produk ke database
        $sql = "UPDATE produkk SET nama='$nama', id_kategori='$id_kategori', stok='$stok', harga='$harga', deskripsi='$deskripsi'";
        if (isset($gambar)) {
            $sql .= ", gambar='$gambar'";
        }
        $sql .= " WHERE id_produk='$id_produk'";

        if ($conn->query($sql) === TRUE) {
            header("Location: produk.php");
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        // Ambil data produk berdasarkan id_produk yang dipilih
        if (isset($_GET['id_produk'])) {
            $id_produk = $_GET['id_produk'];
            $sql = "SELECT * FROM produkk WHERE id_produk = $id_produk";
            $result = $conn->query($sql);

            if ($result->num_rows == 1) {
                $row = $result->fetch_assoc();
                $nama = $row['nama'];
                $id_kategori = $row['id_kategori'];
                $stok = $row['stok'];
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
    }

    $conn->close();
    ?>
    <div class="container">
        <h2>Edit Data Produk</h2>
        <form method="post" enctype="multipart/form-data">
            <input type="hidden" name="id_produk" value="<?php echo $id_produk; ?>">
            <label for="nama">Nama Produk:</label><br>
            <input type="text" name="nama" value="<?php echo $nama; ?>"><br><br>
            <label for="id_kategori" style="margin-bottom:10px;">Kategori:</label>
            <select style="height:30px; border-radius: 5px; margin-bottom:25px; margin-top:15px;"  id="id_kategori" name="id_kategori">
                <option value="1" <?php if ($id_kategori == 1) echo "selected"; ?>>Makanan</option>
                <option value="2" <?php if ($id_kategori == 2) echo "selected"; ?>>Aksesoris</option>
                <option value="3" <?php if ($id_kategori == 3) echo "selected"; ?>>Obat</option>
            </select>
            <label for="stok">Stok:</label><br>
            <input type="number" name="stok" value="<?php echo $stok; ?>"><br><br>
            <label for="harga">Harga:</label><br>
            <input type="number" name="harga" value="<?php echo $harga; ?>"><br><br>
            <label for="deskripsi">Deskripsi:</label><br>
            <textarea name="deskripsi"><?php echo $deskripsi; ?></textarea><br><br>

            <label for="gambar">Gambar:</label><br>
            <input type="file" name="gambar"><br><br>
            <?php if ($gambar): ?>
                <img src="../img/<?php echo $gambar; ?>" alt="Gambar Produk" style="max-width: 200px;"><br><br>
            <?php endif; ?>
            <input type="submit" name="submit" value="Simpan">
        </form>
    </div>
</body>
</html>
