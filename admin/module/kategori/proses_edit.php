<?php
include "../../../inc/config.php";

if (!empty($_POST['kategori'])) {
    // Proses update data
    $id = $_POST['id'];
    $kategori = $_POST['kategori'];
    
    $query = "UPDATE kategori SET nm_kategori='$kategori' WHERE id='$id'";
    
    if (mysqli_query($mysqli, $query)) {
        header('Location:../../dasboard.php?m=kategori');
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($mysqli);
    }
} else {
    header('Location:../../dasboard.php?m=kategori');
}
?>
