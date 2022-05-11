<?php
include "../../../inc/config.php";
if (!empty($_POST['judul'])) {
    // proses update kategori
    mysqli_query($konek, "UPDATE berita SET 
    id_kategori='$_POST[kategori]',
    judul='$_POST[judul]',
    isi='$_POST[isi]'
    WHERE id='$_POST[id]'");
    header('Location:../dashboard.php?m=diskusi');
} else {
    header('Location:../dashboard.php?m=diskusi');
}
