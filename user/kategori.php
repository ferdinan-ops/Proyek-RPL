<?php
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

    <title>UNIKA Discussion Forum</title>
    <link rel="stylesheet" href="../inc/style.css">
    <link rel="icon" type="iscon/x-image" href="../images/title.png">
    <style>
        .t-kategori .container {
            width: 100%;
        }

        @media (min-width: 992px) {
            .t-kategori .container {
                width: 50%;
            }
        }
    </style>
</head>

<body>

    <!-- Tambah Kategori -->
    <section class="t-kategori" style="margin-top: 150px; margin-bottom: 0px;">
        <div class="container bg-light p-5">
            <h3 class="fw-bold">Category</h3>
            <a href="./?hal=tambahkategori"><button class="btn shadow-lg link-light mt-4" type="button" style="background-color: #960909;">
                    <i class="uil uil-plus"></i> Tambah Kategori Diskusi Baru
                </button></a>
            <div class="category d-flex justify-content-between flex-column">
                <?php
                $sqlKategori = mysqli_query($konek, "SELECT * FROM kategori");
                while ($k = mysqli_fetch_array($sqlKategori)) {
                ?>
                    <li style="list-style: none;">
                        <a href="./?hal=diskusi&ktg=<?= $k['id']; ?>" class="btn btn-outline-secondary mt-4" style="width: 100%;">
                            <?= $k['nm_kategori']; ?>
                        </a>
                    </li>
                <?php } ?>
            </div>
        </div>
    </section>
    <!-- Akhir tambah kategori -->
    <!-- footer -->
    <footer>
        <center>
            <img src="../images/footer.png" alt="logo" width="200px">
        </center>
    </footer>
    <!-- Akhir footer -->
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>