<?php
include "../../../inc/config.php";
// proses hapus kategori
mysqli_query($konek, "DELETE FROM kategori WHERE id='$_GET[id]'");
header('Location:../dashboard.php?m=kategori');
