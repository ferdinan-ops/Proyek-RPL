<?php
include "../../inc/config.php";
session_start();
// proses hapus kategori
if (!empty($_GET['id'])) {
    $sqlKomentar = mysqli_query($konek, "SELECT * FROM komentar WHERE id_berita='$_GET[id]'");
    while ($rowKomen = mysqli_fetch_array($sqlKomentar)) {
        $sqlHapuskomen = mysqli_query($konek, "SELECT * FROM file_komen WHERE id_komentar='$rowKomen[id]'");
        while ($rowHapusKomen = mysqli_fetch_array($sqlHapuskomen)) {
            if (file_exists('../komentar/' . $rowHapusKomen['lokasi'])) {
                unlink('../komentar/' . $rowHapusKomen['lokasi']);
            }
        }
        mysqli_query($konek, "DELETE FROM file_komen WHERE id_komentar='$rowKomen[id]'");
    }
    mysqli_query($konek, "DELETE FROM komentar WHERE id_berita='$_GET[id]'");

    $sqlHapus = mysqli_query($konek, "SELECT * FROM file WHERE id_berita='$_GET[id]'");
    while ($row = mysqli_fetch_array($sqlHapus)) {
        if (file_exists($row['lokasi'])) {
            unlink($row['lokasi']);
        }
    }
    mysqli_query($konek, "DELETE FROM file WHERE id_berita='$_GET[id]'");
    mysqli_query($konek, "DELETE FROM berita WHERE id='$_GET[id]'");
    $level = $_SESSION['level'];
    if ($level == "admin") {
        header('Location:../../admin/module/dashboard.php?m=diskusi');
    } else {
        header('Location:.././');
    }
} else {
    $level = $_SESSION['level'];
    if ($level == "admin") {
        header('Location:../../admin/module/dashboard.php?m=diskusi');
    } else {
        header('Location:../diskusi');
    }
}
