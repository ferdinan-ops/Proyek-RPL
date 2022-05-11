<?php
include "../inc/config.php";
session_start();
if (!empty($_POST['judul'])) {
    // update diskusi
    mysqli_query($konek, "UPDATE berita SET 
    id_kategori='$_POST[kategori]',
    judul='$_POST[judul]',
    isi='$_POST[isi]'
    WHERE id='$_POST[id]'");

    // proses update kategori

    $folderUpload = "assets/uploads";

    # periksa apakah folder tersedia
    if (!is_dir($folderUpload)) {
        # jika tidak maka folder harus dibuat terlebih dahulu
        mkdir($folderUpload, 0777, $rekursif = true);
    }
    $files = $_FILES;
    $jumlahFile = count($files['listGambar']['name']);

    for ($i = 0; $i < $jumlahFile; $i++) {
        $namaFile = $files['listGambar']['name'][$i];
        $lokasiTmp = $files['listGambar']['tmp_name'][$i];

        # kita tambahkan uniqid() agar nama gambar bersifat unik
        $namaBaru = uniqid() . '-' . $namaFile;
        $lokasiBaru = "{$folderUpload}/{$namaBaru}";
        $prosesUpload = move_uploaded_file($lokasiTmp, $lokasiBaru);

        # jika proses berhasil
        if ($prosesUpload) {
            mysqli_query($konek, "INSERT INTO file (nama,lokasi,id_berita) VALUES ('$namaFile','$lokasiBaru','$_POST[id]')");
        } else {
            echo "<span style='color: red'>Upload file {$namaFile} gagal</span> <br>";
        }
    }

    $level = $_SESSION['level'];
    if ($level == "admin") {
        header('Location:../admin/module/dashboard.php?m=diskusi');
    } else {
        header('Location:.././');
    }
} else {
    $level = $_SESSION['level'];
    if ($level == "admin") {
        header('Location:../admin/module/dashboard.php?m=diskusi');
    } else {
        header('Location:.././');
    }
}
