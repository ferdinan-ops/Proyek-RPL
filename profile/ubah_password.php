<?php
include "../inc/config.php";
if (!empty($_POST['password'])) {
    // proses update kategori
    $password = md5($_POST['password']);
    mysqli_query($konek, "UPDATE user SET 
    password='$password'
    WHERE id='$_POST[id]'");
    session_start();
    session_destroy();
    header('location:../login.php');
} else {
    header('Location:.././?hal=profile&m=home');
    echo "<script> window.alert('Pastikan Semua Data Terisi!!');</script>";
}
