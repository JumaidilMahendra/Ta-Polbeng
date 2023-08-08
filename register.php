<?php
include_once("koneksi.php");

function registerUser() {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Mengambil data dari form
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Mengenkripsi password menggunakan fungsi MD5
        $encryptedPassword = md5($password);

        // Menyimpan data ke tabel "user"
        $sql = "INSERT INTO users (username, password) VALUES ('$username', '$encryptedPassword')";

        global $conn;
        if ($conn->query($sql) === TRUE) {
            return "Pendaftaran berhasil!";
        } else {
            return "Pendaftaran gagal!";
        }
    }
}

// Contoh penggunaan
$message = registerUser();
echo $message;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Form Pendaftaran</title>
    <link rel="stylesheet" type="text/css" href="css/login.css">
</head>
<body>
    <div class="container">
        <form method="post" action="register.php">
            <h2>Form Pendaftaran</h2>
            <div class="input-group">
                <label>Username</label>
                <input type="text" name="username" required>
            </div>
            <div class="input-group">
                <label>Password</label>
                <input type="password" name="password" required>
            </div>
            <div class="input-group">
                <button type="submit" class="btn" name="register">Daftar</button>
            </div>
        </form>
    </div>
</body>
</html>
