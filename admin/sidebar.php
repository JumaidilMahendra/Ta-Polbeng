<?php
        include_once("../koneksi.php");

// Cek apakah pengguna sudah login
if (!isset($_SESSION["username"])) {
    // Pengguna belum login, redirect ke halaman login
    header("Location: ../login.php");
    exit;
}

// Jika pengguna sudah login, tampilkan halaman dashboard
        
?>
<!DOCTYPE html>
<html>
<head>
    <title>Sidebar</title>
    <style>
        /* Styles for sidebar */
        .sidebar {
            width: 200px;
            height: 100vh;
            background-color: #f1f1f1;
            padding: 20px;
            position: fixed;
            top: 0;
            left: 0;
            transition: transform 0.3s ease-in-out;
            background-image: linear-gradient( to top,  rgba(4,29,55,1) -0.1%, rgba(2,67,135,1) 25.1%, rgba(28,133,243,1) 49.6%, rgba(115,181,250,1) 74.5%, rgba(214,239,253,1) 99.3% );
        }

        .sidebar h2 {
            margin-bottom: 20px;
        }

        .sidebar ul {
            padding: 0;
            list-style-type: none;
        }

        .sidebar li {
            margin-bottom: 10px;
        }

        .sidebar a {
            text-decoration: none;
            color: #333;
            font-weight: bold;
        }

        /* Styles for sidebar toggler */
        .sidebar-toggler {
            display: none;
        }

        /* Media query for responsive design */
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
            }

            .sidebar.show {
                transform: translateX(0);
            }

            .sidebar-toggler {
                display: block;
                font-size: 20px;
                position: fixed;
                top: 10px;
                left: 10px;
                cursor: pointer;
            }
        }
    </style>
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <h2>Hijrah Petshop</h2>
        <ul>
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="produk.php">Produk</a></li>
            <!-- <li><a href="jasa.php">Jasa</a></li> -->
            <!-- <li><a href="kontak.php">Kontak</a></li> -->
            <li><a href="logout.php">Keluar</a></li>
        </ul>
    </div>

    <!-- Sidebar Toggler -->
    <div class="sidebar-toggler" onclick="toggleSidebar()">
        &#9776;
    </div>

    <script>
        function toggleSidebar() {
            var sidebar = document.getElementById("sidebar");
            sidebar.classList.toggle("show");
        }
    </script>
</body>
</html>
