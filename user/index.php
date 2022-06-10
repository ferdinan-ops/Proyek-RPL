<?php
session_start();
if (!isset($_SESSION['login'])) {
    header('location:../login.php');
}
$level = $_SESSION['level'];
if ($level == "admin") {
    echo "Anda Tidak Punya Akses Kesini";
    header('location:../login.php');
}
include "../inc/config.php";

?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />

    <title>UNIKA Discussion Forum</title>
    <link rel="stylesheet" href="../inc/style.css">
    <link rel="icon" type="icon/x-image" href="../images/title.png">

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <style>

    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light shadow-sm fixed-top" style="background-color: #fff;">
        <div class="container">
            <a class="navbar-brand" href="./">
                <img src="../images/logo3.png" alt="" width="300">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-md-auto d-flex justify-content-around">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="./">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="./?hal=kategori">Category</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="./?hal=profile&m=home">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active logout" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Akhir Navbar -->
    <?php
    if (isset($_GET['hal'])) {
        if ($_GET['hal'] == 'kategori') {
            include 'kategori.php';
        } elseif ($_GET['hal'] == 'profile') {
            include 'profile/profile.php';
        } elseif ($_GET['hal'] == 'diskusi') {
            include "hal_diskusi.php";
        } elseif ($_GET['hal'] == 'tambahdiskusi' || $_GET['hal'] == 'editdiskusi') {
            include "diskusi/tambah_diskusi.php";
        } elseif ($_GET['hal'] == 'tambahkategori') {
            include "kategori/tambah_kategori.php";
        } elseif ($_GET['hal'] == 'search') {
            include "search.php";
        }
    } else {
    ?>
        <!-- Kategori Menu -->
        <section class="kategori" style="margin-top: 150px;">
            <div class="container d-flex justify-content-between align-items-center flex-column flex-lg-row">
                <div class="dropdown me-2 mb-3 mb-lg-0">
                    <a href="./?hal=tambahdiskusi">
                        <button class="btn shadow link-light" type="button" style="background-color: #960909;">
                            <i class="uil uil-plus"></i> Diskusi Baru
                        </button>
                    </a>
                </div>

                <form class="d-flex" style="width: 85%;" method='post' action='./?hal=search'>
                    <input class="form-control" type="search" placeholder="Cari Diskusi Disini" aria-label="Search" style="width: 100%;" name="teks">
                    <button class="btn link-light" type="submit" style="background-color: #960909;"><i class="uil uil-search"></i>
                    </button>
                </form>
            </div>
        </section>
        <!-- Akhir Kategori Menu -->
        <section class="judul">
            <div class="container mt-5 bg-light p-4 shadow-sm rounded-3">
                <h3 class="fw-bold mb-4" style="color: #960909;">Diskusi Terbaru</h3>
                <table class="table" style="width: 100%;">

                    <thead>
                        <tr>
                            <th scope='col'>Judul Diskusi</th>
                            <th scope='col' class='px-3 px-lg-0'>Kategori</th>
                            <th scope='col'>Dibuat</th>
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
                            <a href='./?hal=diskusi&ktg=$brt[id_kategori];' class='list-group-item-success py-1 px-2 rounded-2 fs-6 link-success'>$brt[nm_kategori]
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
        </section>
        <!-- footer -->
        <footer>
            <center>
                <img src="../images/footer.png" alt="logo" width="200px">
            </center>
        </footer>
        <!-- Akhir footer -->
    <?php
    }
    ?>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->


    <!-- JQuery -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Slick JS -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

    <script src="script.js"></script>
    <!-- Our Script -->
    <script>
        $(document).ready(function() {
            $('.slider').slick({
                autoplay: true,
                autoplaySpeed: 2500,
                dots: true
            });
        });
    </script>
    <script>
        $('textarea').summernote({
            placeholder: 'Isi Diskusi',
            tabsize: 2,
            height: 300,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link']],
                ['view', ['fullscreen']]
            ]
        });
    </script>
</body>

</html>