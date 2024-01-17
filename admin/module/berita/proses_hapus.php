<?php
include "../../../inc/config.php";

// Pastikan parameter id bersih dari SQL Injection
$idToDelete = mysqli_real_escape_string($mysqli, $_GET['id']);

// Gunakan prepared statement untuk menghindari SQL Injection
$stmt = $mysqli->prepare("DELETE FROM berita WHERE id = ?");
$stmt->bind_param("s", $idToDelete);
$stmt->execute();
$stmt->close();

header('Location:../../dasboard.php?m=berita');
?>
