<?php
session_start();
include "../inc/config.php";
if (!empty($_POST['nama']) && !empty($_POST['email']) && !empty($_POST['notelp'])) {
    mysqli_query($konek, "UPDATE user SET nama_lengkap='$_POST[nama]', email='$_POST[email]', telp='$_POST[notelp]' WHERE id='$_POST[id]'");

    $sqlHapus = mysqli_query($konek, "SELECT * FROM user WHERE id='$_GET[id]'");
    $row = mysqli_fetch_array($sqlHapus);
    if ($row['lokasi'] != 'assets/uploads/foto.png') {
        if (file_exists($row['lokasi'])) {
            unlink($row['lokasi']);
        }

        $folderUpload = "assets/uploads";

        $files = $_FILES;
        // $jumlahFile = count($files['img']['name']);

        $namaFile = $files['img']['name'];
        $lokasiTmp = $files['img']['tmp_name'];

        # kita tambahkan uniqid() agar nama gambar bersifat unik
        $namaBaru = uniqid() . '-' . $namaFile;
        $lokasiBaru = "{$folderUpload}/{$namaBaru}";
        $lokasiFile = "../admin/module/user/{$folderUpload}/{$namaBaru}";
        $prosesUpload = move_uploaded_file($lokasiTmp, $lokasiFile);

        # jika proses berhasil
        if ($prosesUpload) {
            mysqli_query($konek, "UPDATE user SET nama_foto='$namaFile',lokasi='$lokasiBaru' WHERE id='$_POST[id]'");
        } else {
            echo "<span style='color: red'>Upload file {$namaFile} gagal</span> <br>";
        }
    } else {
        $folderUpload = "assets/uploads";

        $files = $_FILES;
        // $jumlahFile = count($files['img']['name']);

        $namaFile = $files['img']['name'];
        $lokasiTmp = $files['img']['tmp_name'];

        # kita tambahkan uniqid() agar nama gambar bersifat unik
        $namaBaru = uniqid() . '-' . $namaFile;
        $lokasiBaru = "{$folderUpload}/{$namaBaru}";
        $lokasiFile = "../admin/module/user/{$folderUpload}/{$namaBaru}";
        $prosesUpload = move_uploaded_file($lokasiTmp, $lokasiFile);

        # jika proses berhasil
        if ($prosesUpload) {
            mysqli_query($konek, "UPDATE user SET nama_foto='$namaFile',lokasi='$lokasiBaru' WHERE id='$_POST[id]'");
        } else {
            echo "<span style='color: red'>Upload file {$namaFile} gagal</span> <br>";
        }
    }

    session_start();
    session_destroy();
    header('location:../login.php');
} else {
    header('Location:.././?hal=profile&m=home');
    echo "<script> window.alert('Pastikan Semua Data Terisi!!');</script>";
}
