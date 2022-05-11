<?php
include "../../../inc/config.php";
// proses hapus kategori
$sqlHapus = mysqli_query($konek, "SELECT * FROM file_komen WHERE id_komentar='$_GET[id]'");
while ($row = mysqli_fetch_array($sqlHapus)) {
    if (file_exists('../../../komentar/' . $row['lokasi'])) {
        unlink('../../../komentar/' . $row['lokasi']);
    }
}
mysqli_query($konek, "DELETE FROM file_komen WHERE id_komentar='$_GET[id]'");
mysqli_query($konek, "DELETE FROM komentar WHERE id='$_GET[id]'");

header('Location:../dashboard.php?m=komentar');
