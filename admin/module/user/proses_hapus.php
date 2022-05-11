<?php
include "../../../inc/config.php";
// proses hapus kategori
if (!empty($_GET['id'])) {
    mysqli_query($konek, "DELETE FROM komentar WHERE id='$_GET[id]'");
    header('Location:../dashboard.php?m=komentar');
} else {
    header('Location:../dashboard.php?m=komentar');
}
