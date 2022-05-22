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

    <style>
        /* gambar */

        .slider {
            height: fit-content;
        }

        .slider .slick-slide img.gambar {
            width: 100%;
        }

        /* make button larger and change their positions */
        .slick-prev,
        .slick-next {
            width: 50px;
            height: 50px;
            z-index: 1;
        }

        .slick-prev {
            left: 5px;
        }

        .slick-next {
            right: 5px;
        }

        .slick-prev:before,
        .slick-next:before {
            font-size: 40px;
            text-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        }

        /* move dotted nav position */
        .slick-dots {
            bottom: 15px;
        }

        /* enlarge dots and change their colors */
        .slick-dots li button:before {
            font-size: 12px;
            color: #fff;
            text-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            opacity: 1;
        }

        .slick-dots li.slick-active button:before {
            color: #dedede;
        }

        /* hide dots and arrow buttons when slider is not hovered */
        .slider:not(:hover) .slick-arrow,
        .slider:not(:hover) .slick-dots {
            opacity: 0;
        }

        /* transition effects for opacity */
        .slick-arrow,
        .slick-dots {
            transition: opacity 0.5s ease-out;
        }

        /* akhir gambar */
        .diskusi .container .komentar form #formFileMultiple {
            display: none !important;
        }
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <script src="script.js"></script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>