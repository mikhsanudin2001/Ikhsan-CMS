<?php
if (isset($_GET['m'])) {
    if ($_GET['m'] == 'kategori') {
        include "module/kategori/kategori.php";
    } elseif ($_GET['m'] == 'berita') {
        include "module/berita/berita.php";
    } else {
        echo "<h3>Click Module yang ada di bawah Home</h3>";
    }
} else {
    echo "<h3>Click Module yang ada di bawah Home</h3>";
}
?>
