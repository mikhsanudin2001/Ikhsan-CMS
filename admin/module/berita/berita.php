<?php
if (isset($_GET['tipe'])) {
    if ($_GET['tipe'] == 'tambah') {
        echo "
            <h3>Tambah Data Berita</h3>
            <form method='post' action='module/berita/proses_tambah.php'>
                <table width='100%'>
                    <tr>
                        <td>Judul Berita</td>
                        <td><input type='text' name='judul' size='100' /></td>
                    </tr>
                    <tr>
                        <td>Kategori</td>
                        <td>
                            <select name='kategori'>";
                            
                            // Ambil data kategori dari database
                            $sql_kategori = mysqli_query($mysqli, "SELECT * FROM kategori ORDER BY nm_kategori ASC");
                            
                            // Tampilkan opsi dropdown
                            while ($kategori = mysqli_fetch_array($sql_kategori)) {
                                echo "<option value='{$kategori['id']}'>{$kategori['nm_kategori']}</option>";
                            }
                            
                            echo "</select>
                        </td>
                    </tr>
                    <tr>
                        <td valign='top'>Isi Berita</td>
                        <td>
                            <textarea name='isi'></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                             <input type='submit' value='Simpan'/><input type='button' value='Batal' onClick='history.back();'/>
                        </td>
                    </tr>
                </table>
            </form>
        ";
    } elseif ($_GET['tipe'] == 'edit') {
        // Pastikan $_GET['id'] aman dan merupakan integer
        $id = intval($_GET['id']);

        // Lakukan query untuk mendapatkan data berita
        $sql = "SELECT * FROM berita WHERE id=$id";
        $result = mysqli_query($mysqli, $sql);

        // Periksa apakah query berhasil dijalankan
        if ($result) {
            // Fetch data berita
            $de = mysqli_fetch_array($result);

            // Lakukan pengecekan apakah data ditemukan
            if (!$de) {
                echo "Data tidak ditemukan.";
                exit;
            }
        } else {
            // Tampilkan pesan error jika query gagal dijalankan
            echo "Error: " . mysqli_error($mysqli);
            exit;
        }

        // Sekarang $de berisi data berita yang akan diedit
        echo "
            <h3>Edit Data Berita</h3>
            <form method='post' action='module/berita/proses_edit.php'>
            <input type='hidden' name='id' value='{$de['id']}'/>

                <table width='100%'>
                    <tr>
                        <td>Judul Berita</td>
                        <td><input type='text' name='judul' size='100' value='{$de['judul']}'/></td>
                    </tr>
                    <tr>
                        <td>Kategori</td>
                        <td>
                            <select name='kategori'>";

        // Ambil data kategori dari database
        $sql_kategori = mysqli_query($mysqli, "SELECT * FROM kategori ORDER BY nm_kategori ASC");

        // Tampilkan opsi dropdown
        while ($kategori = mysqli_fetch_array($sql_kategori)) {
            $selected = ($kategori['id'] == $de['kategori']) ? 'selected' : '';
            echo "<option value='{$kategori['id']}' $selected>{$kategori['nm_kategori']}</option>";
        }

        echo "</select>
                        </td>
                    </tr>
                    <tr>
                        <td valign='top'>Isi Berita</td>
                        <td>
                            <textarea name='isi'>{$de['isi']}</textarea>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type='submit' value='Update'/><input type='button' value='Batal' onClick='history.back();'/>
                        </td>
                    </tr>
                </table>
            </form>";
    }
} else {
    echo "
    <h3>Manajemen Berita</h3>
    <a href='?m=berita&tipe=tambah'>Tambah Data</a>
    <table border='1' width='100%' cellspacing='0'>
        <tr>
            <th>No</th>
            <th>Judul</th>
            <th>Aksi</th>
        </tr>";
    
    $sql = mysqli_query($mysqli, "SELECT * FROM berita ORDER BY id ASC");
    $no = 1;
    while ($k = mysqli_fetch_array($sql)) {
        echo "
        <tr>
            <td align='center'>$no</td>
            <td>{$k['judul']}</td>
            <td align='center' width='140px'>
                <a href='?m=berita&tipe=edit&id={$k['id']}'>Edit</a>
                <a href='module/berita/proses_hapus.php?id={$k['id']}' onClick='return confirm(\"Anda yakin akan menghapus?\")'>Hapus</a>
            </td>
        </tr>";
        $no++;
    }

    echo "</table>";
}
?>
