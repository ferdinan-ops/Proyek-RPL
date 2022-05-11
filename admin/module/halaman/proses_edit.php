<?php
include "../../../inc/config.php";
if (!empty($_POST['judul'])) {
    // proses update kategori
    mysqli_query($konek, "UPDATE halaman SET 
    judul='$_POST[judul]',
    isi='$_POST[isi]'
    WHERE id='$_POST[id]'");
    header('Location:../dashboard.php?m=halaman');
} else {
    header('Location:../dashboard.php?m=halaman');
}
