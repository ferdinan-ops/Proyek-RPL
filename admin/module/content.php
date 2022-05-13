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
?>
    <h1 class='mt-4''>Dashboard</h1>
    <h2 class=' fw-light'>Selamat Datang Administrator</h2>
        <div class="bungkus d-flex justify-content-between mt-4 flex-lg-row flex-column">
            <div class="point mt-5 mt-lg-0">
                <h5 class="text-center pt-4">Total User</h5>
                <div class="sumUser d-flex align-items-center px-5 py-4">
                    <?php
                    $sqlUser = mysqli_query($konek, "SELECT * FROM user ");
                    $user = mysqli_num_rows($sqlUser);
                    ?>
                    <p class="me-4 fs-4"><?= $user ?> Orang</p>
                    <i class="uil uil-user" style=" font-size: 80px;"></i>
                </div>
            </div>
            <div class="point mt-5 mt-lg-0">
                <h5 class="text-center pt-4">Total Diskusi</h5>
                <div class="sumUser d-flex align-items-center px-5 py-4">
                    <?php
                    $sqlDiskusi = mysqli_query($konek, "SELECT * FROM berita ");
                    $diskusi = mysqli_num_rows($sqlDiskusi);
                    ?>
                    <p class="me-4 fs-4"><?= $diskusi ?> Diskusi</p>
                    <i class="uil uil-users-alt" style="font-size: 80px;"></i>
                </div>
            </div>
            <div class="point mt-5 mt-lg-0">
                <h5 class="text-center pt-4">Total Kategori</h5>
                <div class="sumUser d-flex align-items-center px-5 py-4">
                    <?php
                    $sqlKategori = mysqli_query($konek, "SELECT * FROM user ");
                    $kategori = mysqli_num_rows($sqlKategori);
                    ?>
                    <p class="me-4 fs-4"><?= $kategori ?> Kategori</p>
                    <i class="uil uil-list-ul" style="font-size: 80px;"></i>
                </div>
            </div>
        </div>
        <div class="tabel mt-5">
            <h3 class="mb-3">Tabel Diskusi</h3>
            <table class="table table-striped" style="width:  100%; text-align: center;">
                <thead></thead>
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Judul</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = mysqli_query($konek, "SELECT*FROM berita ORDER BY judul asc");
                    $no = 1;
                    while ($k = mysqli_fetch_array($sql)) {
                        echo "<tr>
                    <td>$no</td>
                    <td>$k[judul]</td>
                </tr>";
                        $no++;
                    }
                    ?>
                </tbody>
            </table>
        </div>
    <?php
}
