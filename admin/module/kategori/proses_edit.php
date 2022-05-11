<?php
include "../../../inc/config.php";
if (!empty($_POST['kategori'])) {
    // proses update kategori
    mysqli_query($konek, "UPDATE kategori SET nm_kategori='$_POST[kategori]' WHERE id='$_POST[id]'");
    header('Location:../dashboard.php?m=kategori');
} else {
    header('Location:../dashboard.php?m=kategori');
}
