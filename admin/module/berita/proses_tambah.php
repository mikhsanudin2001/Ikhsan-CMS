<?php
include "../../../inc/config.php";

if (!empty($_POST['judul'])) {
    // Proses simpan
    $tgl= date("Y-m-d");
    $iduser=$_SESSION['id'];
    $query = "INSERT INTO berita (id_kategori,judul,isi,tgl,id_user) VALUES ('$_POST[kategori]','$_POST[judul]','$_POST[isi]','$tgl','$iduser')";
    
    if (mysqli_query($mysqli, $query)) {
        header('Location:../../dasboard.php?m=berita');
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($mysqli);
    }
} else {
    header('Location:../../dasboard.php?m=berita');
}
?>
