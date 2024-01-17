<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
    <style>
        body {background: #000;font-family:arial;}
        .loginbox{width: 400px; padding:10px; margin: 100px auto; background: #f3f3f3;}
        form{padding: 10px;border: 1px solid #ebebeb;}
        label{float:left;display:block; width: 140px;}
    </style>
</head>
<body>
    <div class="loginbox">
        <div class="login_msg">
            <?php
                include "../inc/config.php";
                
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $pass = md5($_POST['password']);
                    $sqlCek = "SELECT * FROM user WHERE username = '{$_POST['username']}' AND password = '$pass' AND aktif = 'Y'";
                    $resultCek = $mysqli->query($sqlCek);

                    if ($resultCek) {
                        $count = $resultCek->num_rows;
                        if ($count > 0) {
                            session_start();
                            $_SESSION['login'] = TRUE;
                            $_SESSION['username'] = $_POST['username']; // Menyimpan username ke dalam sesi
                            $_SESSION['id'] = $_POST['id'];
                            $_SESSION['nama'] = $_POST['nama_lengkap'];
                            header("Location: dasboard.php"); // Arahkan ke halaman dashboard atau halaman setelah login berhasil
                            exit();
                            echo "Login berhasil!";
                            // Lakukan aksi setelah login berhasil
                        } else {
                            echo "Login gagal. Periksa kembali username dan password Anda.";
                        }
                    } 
                }
            ?>
        </div>
        <form method="post" name="login">
            <label>Username</label><input type="text" name="username"/><br/>
            <label>Password</label><input type="password" name="password"/><br/>
            <label>&nbsp;</label><input type="submit" value="Login"/><br/>
        </form>
        <p>Belum punya akun? <a href="register.php">Registrasi disini</a>.</p>
    </div>
</body>
</html>
