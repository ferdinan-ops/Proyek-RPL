<?php
include "../../inc/config.php";
if (!empty($_POST['kategori'])) {
    // proses insert kategori
    mysqli_query($konek, "INSERT INTO kategori (nm_kategori) VALUES ('$_POST[kategori]')");
    header('Location:.././');
} else {
    header('Location:.././');
}
