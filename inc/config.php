<?php
// Variabel untuk koneksi
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "dbcmsku";

// Membuat objek koneksi
$mysqli = new mysqli($host, $user, $pass, $dbname);

// Memeriksa koneksi
if ($mysqli->connect_error) {
    die("Koneksi ke MySQL gagal: " . $mysqli->connect_error);
}

// Memilih database
$db_selected = $mysqli->select_db($dbname);

// Memeriksa pemilihan database
if (!$db_selected) {
    die ("Database tidak ditemukan: " . $mysqli->error);
}