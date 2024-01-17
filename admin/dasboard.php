<?php
session_start();
if (!isset($_SESSION['login'])) {
    header('location:index.php');
}
include "../inc/config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Content Management System</title>
    <link rel="stylesheet" href="style.css"/>
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script> 
  
    <script>tinymce.init({selector:'textarea'});</script>

</head>
<body>
    <table width="100%">
        <tr>
            <td colspan="2" bgcolor="#ebebeb"><h1>Content Management System</h1></td>
            <h3>SELAMAT DATANG</h3>
        </tr>
        <tr>
            <td valign="top" width="250px">
                <div class="menu">
                    <ul>
                        <li><a href="./dasboard.php">Home</a></li>
                        <li><a href="./dasboard.php?m=kategori">Manajemen Kategori</a></li>
                        <li><a href="./dasboard.php?m=berita">Manajemen Berita</a></li>
                        <li><a href="./logout.php">Logout</a></li>
                    </ul>
                </div>
            </td>
            <td valign="top">
                <div class="content">
                    <?php include "content.php";?>
                </div>
            </td>
        </tr>
        <tr>
            <td colspan="2" bgcolor="#ebebeb">Copright &copy; 2024 Ikhsan-CMS</td>
        </tr>
    </table>
</body>
</html>
