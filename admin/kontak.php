<!DOCTYPE html>
<html>

<head>
    <?php 
    include_once("sidebar.php");
    include_once("../koneksi.php");

    // Mendapatkan data kontak dari database
    $query = "SELECT * FROM kontak";
    $result = mysqli_query($conn, $query);

    // Memeriksa apakah data kontak ditemukan atau tidak
    if (mysqli_num_rows($result) > 0) {
        $kontak = mysqli_fetch_assoc($result);

        // Menyimpan data kontak dalam variabel
        $nomorTlp = $kontak['nomor_tlp'];
        $alamat = $kontak['alamat'];
        $facebook = $kontak['facebook'];
        $instagram = $kontak['instagram'];
        $whatsapp = $kontak['whatsapp'];
    } else {
        // Jika data kontak tidak ditemukan, isi variabel dengan nilai default atau kosong
        $nomorTlp = "Nomor telepon tidak tersedia";
        $alamat = "Alamat tidak tersedia";
        $facebook = "Facebook tidak tersedia";
        $instagram = "Instagram tidak tersedia";
        $whatsapp = "Whatsapp tidak tersedia";
    }

    // Menutup koneksi database
    mysqli_close($conn);
    ?>

    <title>Tabel Kontak</title>
    <link rel="stylesheet" href="../css/admin_kontak.css?<?php echo time();?>"/>
</head>

<body>
    <div class="container">
        <p>Kontak Anda</p>
        <table>
            <tr>
                <th>Nomor Telepon</th>
                <th>Alamat</th>
                <th>Facebook</th>
                <th>Instagram</th>
                <th>Whatsapp</th>
            </tr>
            <tr>
                <td><?php echo $nomorTlp; ?></td>
                <td><?php echo $alamat; ?></td>
                <td><?php echo $facebook; ?></td>
                <td><?php echo $instagram; ?></td>
                <td><?php echo $whatsapp; ?></td>
            </tr>
        </table>
        <a href="edit_kontak.php" class="tombol-tambah">Edit</a>
    </div>
</body>

</html>
