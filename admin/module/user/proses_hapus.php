<?php
include "../../../inc/config.php";
// proses hapus kategori
if (!empty($_GET['id'])) {
    mysqli_query($konek, "DELETE FROM user WHERE id='$_GET[id]'");
    header('Location:../dashboard.php?m=user');
} else {
    header('Location:../dashboard.php?m=user');
}
