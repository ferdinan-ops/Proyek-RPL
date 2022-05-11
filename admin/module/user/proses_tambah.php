<?php
session_start();
include "../../../inc/config.php";
if (!empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['nama']) && !empty($_POST['email']) && !empty($_POST['notelp'])) {
    // proses insert diskusi
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
        mysqli_query($konek, "INSERT INTO user (username,password,nama_lengkap,email,telp,level,aktif,nama_foto,lokasi) VALUES 
        ('$_POST[username]','$password','$_POST[nama]','$_POST[email]','$_POST[notelp]','$_POST[level]','$_POST[aktif]','$namaFile','$lokasiBaru')");
        header('Location:../dashboard.php?m=user');
    } else {
        echo "<span style='color: red'>Upload file {$namaFile} gagal</span> <br>";
    }
} else {
    header('Location:../dashboard.php?m=user');
    echo "<script>alert('Pastikan Semua Data Terisi!!');</script>";
}
// session_start();
// include "../../../inc/config.php";
// if (!empty($_POST['judul'])) {
//     $tgl = date("Y-m-d");
//     $iduser = $_SESSION['id'];
//     mysqli_query($konek, "insert into berita (id_kategori, judul, isi, tgl,id_user) values ('$_POST[kategori]','$_POST[judul],'$_POST[isi]', '$tgl', '$iduser')");
//     header('Location:../dashboard.php?m=diskusi');
// } else {
//     header('Location:../dashboard.php?m=diskusi');
// }
