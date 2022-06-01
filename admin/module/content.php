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
    } elseif ($_GET['m'] == 'pesan') {
        include "contact/contact.php";
    } else {
        echo "<h3>Module tidak ditemukan</h3><p>Silahkan pilih menu yang lain!</p>";
    }
} else {
?>
    <h1 class='mt-4''>Dashboard</h1>
    <h2 class=' fw-light'>Selamat Datang Administrator</h2>
        <div class="bungkus d-flex justify-content-between mt-5 flex-lg-row flex-column">
            <div class="point">
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
            <table class="dashboard-table" style="width:  100%; ">
                <thead>
                    <tr class="text-center">
                        <th scope="col">Judul</th>
                        <th scope="col" class="text-start">Kategori</th>
                        <th scope="col">Oleh</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sqlBerita = mysqli_query($konek, "SELECT berita.*,kategori.nm_kategori,user.nama_lengkap
                    FROM berita INNER JOIN kategori ON berita.id_kategori=kategori.id
                    INNER JOIN user ON berita.id_user=user.id ORDER BY tgl DESC");
                    while ($brt = mysqli_fetch_array($sqlBerita)) {
                        echo "
                    <tr>
                        <td><a href='./?hal=diskusi&id=$brt[id]' class='juduld'>$brt[judul]</a></td>
                        <td class='px-3 px-lg-0 text-center text-lg-start''>
                            <a href=' ./?hal=diskusi&ktg=$brt[id_kategori];' class='list-group-item-success py-1 px-2 rounded-2 fs-6 link-success'>$brt[nm_kategori]
                            </a>
                        </td>
                        <td><a href='./?hal=profile&id=$brt[id_user]'>$brt[nama_lengkap]</a></td>
                    </tr>
                    ";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    <?php
}
