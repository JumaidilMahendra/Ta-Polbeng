<?php


include_once("koneksi.php");

function loginUser() {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Mengambil data dari form
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Mengenkripsi password menggunakan fungsi MD5
        $encryptedPassword = md5($password);

        // Memeriksa data pengguna dalam tabel "users"
        global $conn;
        $sql = "SELECT * FROM users WHERE username='$username' AND password='$encryptedPassword'";
        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            $_SESSION["username"] = $username; // Simpan username dalam sesi
            header("Location: admin/dashboard.php"); // Redirect ke halaman dashboard setelah login berhasil
            exit();
        } else {
            return "Username atau password salah!";
        }
    }
}

// Memeriksa status login pengguna
if (isset($_SESSION["username"])) {
    header("Location: admin/dashboard.php"); // Redirect ke halaman dashboard jika pengguna sudah login
    exit();
}

// Menghandle proses login
$message = loginUser();

?>

<!DOCTYPE html>
<html>
<head>
    <title>Halaman Login</title>
    <link rel="stylesheet" type="text/css" href="css/login.css">
</head>
<body>
    <div class="container">
        <form method="post" action="login.php">
            <h2> Login</h2>
            <div class="input-group">
                <label>Username</label>
                <input type="text" name="username" required>
            </div>
            <div class="input-group">
                <label>Password</label>
                <input type="password" name="password" required>
            </div>
            <div class="input-group">
                <button type="submit" class="btn" name="login">Login</button>
            </div>
        </form>
    </div>
</body>
</html>