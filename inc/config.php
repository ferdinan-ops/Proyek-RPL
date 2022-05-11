<?php
// $servername = "localhost";
// $database = "dbdiskusi";
// $username = "root";
// $password = "";
// $port = "3307";

// // untuk tulisan bercetak tebal silakan sesuaikan dengan detail database Anda
// // membuat koneksi
// $conn = mysqli_connect($servername, $username, $password, $database, $port);
// // mengecek koneksi
// if (!$conn) {
//     die("Koneksi gagal: " . mysqli_connect_error());
// }
// mysqli_close($conn);

$host = "localhost";
$user = "root";
$pass = "";
$dbname = "dbdiskusi";
$port = "3307";


$konek = mysqli_connect($host, $user, $pass, $dbname, $port);
