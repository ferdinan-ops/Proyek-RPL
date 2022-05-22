<?php
include "../../../inc/config.php";
// proses hapus kategori
if (!empty($_GET['id'])) {
    $sqlHapus = mysqli_query($konek, "SELECT * FROM user WHERE id='$_GET[id]'");
    $row = mysqli_fetch_array($sqlHapus);
    if ($row['lokasi'] != 'assets/uploads/foto.png') {
        if (file_exists($row['lokasi'])) {
            unlink($row['lokasi']);
        }
    }
    mysqli_query($konek, "DELETE FROM user WHERE id='$_GET[id]'");
    header('Location:../dashboard.php?m=user');
} else {
    header('Location:../dashboard.php?m=user');
}
