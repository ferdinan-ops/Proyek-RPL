<?php
include "../../../inc/config.php";
if (!empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['nama']) && !empty($_POST['email']) && !empty($_POST['notelp'])) {
    $password = md5($_POST['password']);
    mysqli_query($konek, "UPDATE user SET username='$_POST[username]', 
    password='$password', 
    nama_lengkap='$_POST[nama]', 
    email='$_POST[email]', 
    telp='$_POST[notelp]', 
    level='$_POST[level]', 
    aktif='$_POST[aktif]'  WHERE id='$_POST[id]'");

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
        $prosesUpload = move_uploaded_file($lokasiTmp, $lokasiBaru);

        # jika proses berhasil
        if ($prosesUpload) {
            $password = md5($_POST['password']);
            mysqli_query($konek, "UPDATE user SET nama_foto='$namaFile',lokasi='$lokasiBaru' WHERE id='$_POST[id]'");
            header('Location:../dashboard.php?m=user');
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
        $prosesUpload = move_uploaded_file($lokasiTmp, $lokasiBaru);

        # jika proses berhasil
        if ($prosesUpload) {
            $password = md5($_POST['password']);
            mysqli_query($konek, "UPDATE user SET nama_foto='$namaFile',lokasi='$lokasiBaru' WHERE id='$_POST[id]'");
            header('Location:../dashboard.php?m=user');
        } else {
            echo "<span style='color: red'>Upload file {$namaFile} gagal</span> <br>";
        }
    }

    header('Location:../dashboard.php?m=user');
} else {
    header('Location:../dashboard.php?m=user');
    echo "<script> window.alert('Pastikan Semua Data Terisi!!');</script>";
}
