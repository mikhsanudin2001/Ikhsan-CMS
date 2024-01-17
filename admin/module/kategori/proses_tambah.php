<?php
include "../../../inc/config.php";

if (!empty($_POST['kategori'])) {
    // Proses simpan
    $kategori = $_POST['kategori'];
    $query = "INSERT INTO kategori (nm_kategori) VALUES ('$kategori')";
    
    if (mysqli_query($mysqli, $query)) {
        header('Location:../../dasboard.php?m=kategori');
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($mysqli);
    }
} else {
    header('Location:../../dasboard.php?m=kategori');
}
?>
