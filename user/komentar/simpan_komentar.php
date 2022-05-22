<?php
include "../../inc/config.php";
$tgl = date("Y-m-d");
$idb = $_POST['idberita'];
mysqli_query($konek, "INSERT INTO komentar (nama,komentar,tgl,id_berita) VALUES ('$_POST[nama]','$_POST[komentar]','$tgl','$idb')");

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
        // echo "Upload file <a href='{$lokasiBaru}' target='_blank'>{$namaBaru}</a> berhasil. <br>";
        $sqlfile = mysqli_query($konek, "SELECT * FROM komentar ORDER BY id DESC");
        $file = mysqli_fetch_array($sqlfile);
        mysqli_query($konek, "INSERT INTO file_komen (nama,lokasi,id_komentar) VALUES ('$namaFile','$lokasiBaru','$file[id]')");
    } else {
        echo "<span style='color: red'>Upload file {$namaFile} gagal</span> <br>";
    }
    header('Location: .././?hal=diskusi&id=' . $idb);
}
// if ($simpan) {
//     header("Location: ./?hal=diskusi&id=$idb");
// }
