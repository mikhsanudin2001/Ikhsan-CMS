<?php
include "../../../inc/config.php";

if (!empty($_POST['judul'])) {
    // Proses update data
    
    $query = "UPDATE berita SET id_kategori='$_POST[id_kategori]',
                                   judul='$_POST[judul]',
                                   isi='$_POST[isi]'
                            WHERE id='$_POST[id]'";
    
    if (mysqli_query($mysqli, $query)) {
        header('Location:../../dasboard.php?m=berita');
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($mysqli);
    }
} else {
    header('Location:../../dasboard.php?m=berita');
}
?>
