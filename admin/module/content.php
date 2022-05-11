<?php
if (isset($_GET['m'])) {
    if ($_GET['m'] == 'kategori') {
        include "kategori/kategori.php";
    } elseif ($_GET['m'] == 'diskusi') {
        include "diskusi/diskusi.php";
    } elseif ($_GET['m'] == 'halaman') {
        include "halaman/halaman.php";
    } elseif ($_GET['m'] == 'user') {
        include "user/user.php";
    } elseif ($_GET['m'] == 'komentar') {
        include "komentar/komentar.php";
    } else {
        echo "<h3>Module tidak ditemukan</h3><p>Silahkan pilih menu yang lain!</p>";
    }
} else {
    echo "<h1 class='mt-4' style='color=#960909;'>Dashboard</h1><h2 class='fw-light'>Selamat Datang Administrator</h2>";
}
