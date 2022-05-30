<?php
include "inc/config.php";
if (!empty($_POST['nama']) && !empty($_POST['email']) && !empty($_POST['pesan'])) {
    // proses insert kategori
    mysqli_query($konek, "INSERT INTO pesan (nama,email,pesan) VALUES ('$_POST[nama]','$_POST[email]','$_POST[pesan]')");
    header('Location:action/yes.php');
} else {
    header('Location:action/no.php');
}
