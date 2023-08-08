<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda</title>
    <link rel="stylesheet" href="css/navbar.css?<?php echo time(); ?>">
</head>

<body>
    <nav class="navbar">
        <div class="logo">
            <a href="index.php">
                <img src="img/logo-kucing.png" alt="Hijrah Petshop" class="logo">
            </a>
            
        </div>
        <div class="menu">
            <ul>
                <li><a href="index.php">Beranda</a></li>
                <li><a href="tentang.php">Tentang Kami</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Produk
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="makanan.php">Makanan</a>
                        <a class="dropdown-item" href="aksesoris.php">Aksesoris</a>
                        <a class="dropdown-item" href="jasa.php">Jasa</a>
                        <a class="dropdown-item" href="obat.php">Obat</a>
                    </div>
                </li>
                <li><a href="kontak.php">Kontak</a></li>
                <li><a href="login.php">Login</a></li>
            </ul>
        </div>
        <div class="sidebar">
            <ul>
                <li><a href="index.php">Beranda</a></li>
                <li><a href="tentang.php">Tentang Kami</a></li>
                <li><a href="makanan.php">Makanan</a></li>
                <li><a href="aksesoris.php">Aksesoris</a></li>
                <li><a href="obat.php">Obat</a></li>
                <li><a href="jasa.php">Jasa</a></li>
                <li><a href="kontak.php">Kontak</a></li>
                <li><a href="login.php">Login</a></li>
            </ul>
        </div>
        <div class="sidebar-toggle" onclick="toggleMenu()">&#9776;</div>
    </nav>

    <!-- Konten halaman -->
    <!-- ... -->

    <script>
        function toggleMenu() {
            var menu = document.querySelector('.sidebar');
            menu.classList.toggle('active');
        }
    </script>
</body>

</html>