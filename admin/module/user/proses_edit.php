<?php
include "../../../inc/config.php";
if (!empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['nama']) && !empty($_POST['email']) && !empty($_POST['notelp'])) {
    // proses update kategori
    $password = md5($_POST['password']);
    mysqli_query($konek, "UPDATE user SET 
    username='$_POST[username]', 
    password='$password', 
    nama_lengkap='$_POST[nama]', 
    email='$_POST[email]', 
    telp='$_POST[notelp]', 
    level='$_POST[level]', 
    aktif='$_POST[aktif]' 
    WHERE id='$_POST[id]'");
    header('Location:../dashboard.php?m-user');
} else {
    header('Location:../dashboard.php?m=user');
    echo "<script> window.alert('Pastikan Semua Data Terisi!!');</script>";
}
