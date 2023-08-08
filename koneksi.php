<?php
$servername = "localhost"; // Nama server
$username = "root"; // Nama pengguna
$password = ""; // Kata sandi
$database = "test"; // Nama database

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $database);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
session_start();
