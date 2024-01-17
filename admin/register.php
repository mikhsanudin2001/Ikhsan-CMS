<?php
// Include konfigurasi database
include "../inc/config.php";

// Setel variabel kesalahan dan pesan
$error = $pesan = "";

// Cek apakah formulir sudah dikirim
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil nilai dari formulir
    $username = $_POST["username"];
    $password = md5($_POST["password"]);
    $namaLengkap = $_POST["nama_lengkap"];
    $email = $_POST["email"];
    $telp = $_POST["telp"];

    // Query untuk memeriksa apakah username sudah ada
    $sqlCekUsername = "SELECT * FROM user WHERE username = '$username'";
    $resultCekUsername = $mysqli->query($sqlCekUsername);

    if ($resultCekUsername->num_rows > 0) {
        $error = "Username sudah digunakan. Silakan pilih username lain.";
    } else {
        // Jika username belum ada, lakukan proses registrasi
        $sqlRegister = "INSERT INTO user (username, password, nama_lengkap, email, telp, level, aktif)
                        VALUES ('$username', '$password', '$namaLengkap', '$email', '$telp', 'User', 'Y')";

        if ($mysqli->query($sqlRegister)) {
            $pesan = "Registrasi berhasil! Silakan login.";
        } else {
            $error = "Registrasi gagal. Silakan coba lagi.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
    <style>
        body {background: #000;font-family:arial;}
        .registerbox {width: 400px; padding:10px; margin: 100px auto; background: #f3f3f3;}
        form {padding: 10px; border: 1px solid #ebebeb;}
        label {float: left; display: block; width: 140px;}
        .error {color: red;}
        .success {color: green;}
    </style>
</head>
<body>
    <div class="registerbox">
        <h2>Registrasi</h2>
        <div class="error"><?php echo $error; ?></div>
        <div class="success"><?php echo $pesan; ?></div>
        <form method="post" name="register">
            <label>Username</label><input type="text" name="username" required/><br/>
            <label>Password</label><input type="password" name="password" required/><br/>
            <label>Nama Lengkap</label><input type="text" name="nama_lengkap" required/><br/>
            <label>Email</label><input type="email" name="email" required/><br/>
            <label>No. Telepon</label><input type="text" name="telp" required/><br/>
            <label>&nbsp;</label><input type="submit" value="Register"/><br/>
        </form>
        <p>Sudah punya akun? <a href="index.php">Login disini</a>.</p>
    </div>
</body>
</html>
