<?php
session_start();
include "../../inc/config.php";
if (!empty($_POST['judul'])) {
    // proses insert diskusi
    $tgl = date("Y-m-d");
    $iduser = $_SESSION['id'];
    mysqli_query($konek, "INSERT INTO berita (id_kategori,judul,isi,tgl,id_user) VALUES 
    ('$_POST[kategori]','$_POST[judul]','$_POST[isi]','$tgl','$iduser')");

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
            $sqlfile = mysqli_query($konek, "SELECT * FROM berita ORDER BY id DESC");
            $file = mysqli_fetch_array($sqlfile);
            mysqli_query($konek, "INSERT INTO file (nama,lokasi,id_berita) VALUES ('$namaFile','$lokasiBaru','$file[id]')");
        } else {
            echo "<span style='color: red'>Upload file {$namaFile} gagal</span> <br>";
        }
    }

    if ($_SESSION['level'] == "admin") {
        header('Location:../../admin/module/dashboard.php?m=diskusi');
    } else {
        header('Location:.././');
    }
} else {
?>
    <script>
        alert("Anda Belum Memasukkan Judul Diskusi");
    </script>
<?php
    if ($_SESSION['level'] == "admin") {
        header('Location:../../admin/module/dashboard.php?m=diskusi');
    } else {
        header('Location:.././');
    }
}
