<?php
if (isset($_GET['id'])) {
    // tampilkan detail berita
    $sqlDetail = mysqli_query($konek, "SELECT berita.*,kategori.nm_kategori,user.nama_lengkap,user.lokasi
            FROM berita INNER JOIN kategori ON berita.id_kategori=kategori.id 
            INNER JOIN user ON berita.id_user=user.id
            WHERE berita.id='$_GET[id]'");
    $dbrt = mysqli_fetch_array($sqlDetail);
?>

    <head>
        <link rel="stylesheet" href="inc/style.css">

    </head>
    <section class="diskusi" style="margin-top: 70px;background-color:white;padding: 50px 0;">
        <div class="container">
            <div class="judul">
                <a href="./?hal=diskusi&ktg=<?= $dbrt['id_kategori']; ?>" class="warning"><?= $dbrt['nm_kategori']; ?></a>
                <h4 style="font-weight: bold;"><?= $dbrt['judul']; ?></h4>
                <hr>
            </div>
            <div class="profile d-flex  align-items-center justify-content-between">
                <div class="user d-flex  align-items-center">
                    <a href="./?hal=profile&id=<?= $dbrt['id_user'] ?>"><img src="admin/module/user/<?= $dbrt['lokasi']; ?>" alt="foto" style="width: 80px;height: 80px;" class="me-3 shadow-sm"></a>
                    <div class="name">
                        <p style="margin-bottom: 1px; font-weight: bold;"><a href="./?hal=profile&id=<?= $dbrt['id_user'] ?>"><?= $dbrt['nama_lengkap']; ?></a></p>
                        <span style="color: rgba(86, 86, 86, 0.667);"><?= $dbrt['tgl']; ?></span>
                    </div>
                </div>
            </div>

            <div class="content my-4 my-lg-0 mb-lg-4" style="text-align: justify;">
                <?= $dbrt['isi']; ?>
            </div>
            <?php
            $sqlfiles = mysqli_query($konek, "SELECT * FROM file WHERE id_berita='$_GET[id]' AND nama NOT LIKE '%.jpg%' AND nama NOT LIKE '%.png%' AND nama NOT LIKE '%.jpeg%' AND nama NOT LIKE '%.gif%'");
            while ($files = mysqli_fetch_array($sqlfiles)) {
                if (!empty($files['nama'])) {
                    $pecah = explode(".", $files['nama']);
                    $ekstensi = $pecah[1];
                    if ($ekstensi == 'zip' && 'rar') {
                        echo "<a href='diskusi/$files[lokasi]' class='word'><img src='images/rar.png' class='me-3' ><p>$files[nama]</p></a>";
                    } elseif ($ekstensi == 'docx' && 'doc') {
                        echo "<a href='diskusi/$files[lokasi]' class='word'><img src='images/word.png' class='me-3' ><p>$files[nama]</p></a>";
                    } elseif ($ekstensi == 'pdf') {
                        echo "<a href='diskusi/$files[lokasi]' class='word' style='background-color:#E0CFCF;color:#AA0000;'><img src='images/pdf.png' class='me-3' ><p>$files[nama]</p></a>";
                    } elseif ($ekstensi == 'ppt' && 'pptx') {
                        echo "<a href='diskusi/$files[lokasi]' class='word' style='background-color:#E9D8D3;color:#BD3A1D;'><img src='images/ppt.png' class='me-3' ><p>$files[nama]</p></a>";
                    } elseif ($ekstensi == 'mp4') {
            ?>
                        <video width="100%" height="" controls>
                            <source src="diskusi/<?= $files['lokasi'] ?>" type="video/mp4">
                        </video>
                    <?php
                    } elseif ($ekstensi == 'mp4') {
                    ?>
                        <audio controls>
                            <source src="diskusi/<?= $files['lokasi'] ?>" type="audio/mp3">
                        </audio>
            <?php
                    } elseif ($ekstensi == 'xlsx') {
                        echo "<a href='diskusi/$files[lokasi]' class='word' style='background-color:rgba(33, 163, 102, 0.2);color:green;'><img src='images/excel.png' class='me-3' ><p>$files[nama]</p></a>";
                    } else {
                        echo "<a href='diskusi/$files[lokasi]' class='word'><img src='images/file.png' class='me-3' ><p>$files[nama]</p></a>";
                    }
                }
            }
            ?>
            <?php
            $sqlfiles = mysqli_query($konek, "SELECT * FROM file WHERE id_berita='$_GET[id]'");
            $files = mysqli_fetch_array($sqlfiles);
            if (!empty($files['nama'])) {
                $pecah = explode(".", $files['nama']);
                $ekstensi = $pecah[1];
                if ($ekstensi == 'jpg' or 'png' or 'jpeg' or 'gif') {
                    $sqlfiles = mysqli_query($konek, "SELECT * FROM file WHERE id_berita='$_GET[id]' AND (nama LIKE '%.jpg%' OR nama LIKE '%.png%' OR nama LIKE '%.jpeg%' OR nama LIKE '%.gif%')");
            ?>
                    <div class="slider">
                        <?php
                        while ($files = mysqli_fetch_array($sqlfiles)) {
                            if (!empty($files['nama'])) {
                                $pecah = explode(".", $files['nama']);
                                $ekstensi = $pecah[1];
                                if ($ekstensi == 'jpg' or 'png' or 'jpeg' or 'gif') {
                        ?>
                                    <a href="#">
                                        <center><img class='mt-4 mt-lg-0 gambar' src='diskusi/<?= $files['lokasi'] ?>' width="100%"></center>
                                    </a>
                        <?php
                                }
                            }
                        }
                        ?>
                    </div>
            <?php
                }
            }
            ?>

            <hr>

            <section class="komentar " id="">
                <div class="container mt-3" style="width: 100%;box-shadow: none;background-color: #eee">
                    <h5 class="mb-4 fw-bold" style="color: #960909;">Diskusi</h5>
                    <?php
                    $sqlKomen = mysqli_query($konek, "SELECT * FROM komentar WHERE id_berita='$dbrt[id]' ORDER BY id DESC");
                    while ($dk = mysqli_fetch_array($sqlKomen)) {
                    ?>
                        <div class="pesan d-flex mb-4">
                            <div class="text bg-light pt-2 ps-2 pe-2 rounded d-flex flex-column" style="width: 100%;">
                                <p class="mb-1 fw-bold" style="font-size: 14px;"><?= $dk['nama'] ?></p>
                                <p style="font-size: 12px; text-align: justify;"><?= $dk['komentar'] ?></p>
                                <?php
                                $sqlFileKomen = mysqli_query($konek, "SELECT * FROM file_komen WHERE id_komentar='$dk[id]' AND nama NOT LIKE '%.jpg%' AND nama NOT LIKE '%.png%' AND nama NOT LIKE '%.jpeg%' AND nama NOT LIKE '%.gif%'");
                                while ($fileKomen = mysqli_fetch_array($sqlFileKomen)) {
                                    if (!empty($fileKomen['nama'])) {
                                        $pecah = explode(".", $fileKomen['nama']);
                                        $ekstensi = $pecah[1];
                                        if ($ekstensi == 'zip' && 'rar') {
                                            echo "<a href='komentar/$fileKomen[lokasi]' class='word'><img src='images/rar.png' class='me-3' ><p>$fileKomen[nama]</p></a>";
                                        } elseif ($ekstensi == 'docx') {
                                            echo "<a href='komentar/$fileKomen[lokasi]' class='word'><img src='images/word.png' class='me-3' ><p>$fileKomen[nama]</p></a>";
                                        } elseif ($ekstensi == 'doc') {
                                            echo "<a href='komentar/$fileKomen[lokasi]' class='word'><img src='images/word.png' class='me-3' ><p>$fileKomen[nama]</p></a>";
                                        } elseif ($ekstensi == 'pdf') {
                                            echo "<a href='komentar/$fileKomen[lokasi]' class='word' style='background-color:#E0CFCF;color:#AA0000;'><img src='images/pdf.png' class='me-3' ><p>$fileKomen[nama]</p></a>";
                                        } elseif ($ekstensi == 'ppt') {
                                            echo "<a href='komentar/$fileKomen[lokasi]' class='word' style='background-color:#E9D8D3;color:#BD3A1D;'><img src='images/ppt.png' class='me-3' ><p>$fileKomen[nama]</p></a>";
                                        } elseif ($ekstensi == 'pptx') {
                                            echo "<a href='komentar/$fileKomen[lokasi]' class='word' style='background-color:#E9D8D3;color:#BD3A1D;'><img src='images/ppt.png' class='me-3' ><p>$fileKomen[nama]</p></a>";
                                        } elseif ($ekstensi == 'mp4') {
                                ?>
                                            <video width="100%" height="" controls>
                                                <source src="komentar/<?= $fileKomen['lokasi'] ?>" type="video/mp4">
                                            </video>
                                        <?php
                                        } elseif ($ekstensi == 'mp4') {
                                        ?>
                                            <audio controls>
                                                <source src="komentar/<?= $fileKomen['lokasi'] ?>" type="audio/mp3">
                                            </audio>
                                <?php
                                        } elseif ($ekstensi == 'xlsx') {
                                            echo "<a href='komentar/$fileKomen[lokasi]' class='word' style='background-color:rgba(33, 163, 102, 0.2);color:green;'><img src='images/excel.png' class='me-3' ><p>$files[nama]</p></a>";
                                        } else {
                                            echo "<a href='komentar/$fileKomen[lokasi]' class='word'><img src='images/file.png' class='me-3' ><p>$fileKomen[nama]</p></a>";
                                        }
                                    }
                                }
                                ?>
                                <?php
                                $sqlFileKomen = mysqli_query($konek, "SELECT * FROM file_komen WHERE id_komentar='$dk[id]'");
                                $fileKomen = mysqli_fetch_array($sqlFileKomen);
                                if (!empty($fileKomen['nama'])) {
                                    $pecah = explode(".", $fileKomen['nama']);
                                    $ekstensi = $pecah[1];
                                    if ($ekstensi == 'jpg' || 'png' || 'jpeg' || 'gif') {
                                        $sqlFileKomen = mysqli_query($konek, "SELECT * FROM file_komen WHERE id_komentar='$dk[id]' AND (nama LIKE '%.jpg%' OR nama LIKE '%.png%' OR nama LIKE '%.jpeg%' OR nama LIKE '%.gif%')");
                                ?>
                                        <div class="slider">
                                            <?php
                                            while ($fileKomen = mysqli_fetch_array($sqlFileKomen)) {
                                                if (!empty($fileKomen['nama'])) {
                                                    $pecah = explode(".", $fileKomen['nama']);
                                                    $ekstensi = $pecah[1];
                                                    if ($ekstensi == 'jpg' or 'png' or 'jpeg' or 'gif') {
                                            ?>
                                                        <a href="#">
                                                            <center><img class='mt-4 mt-lg-0 gambar' src='komentar/<?= $fileKomen['lokasi'] ?>' width="100%"></center>
                                                        </a>
                                            <?php
                                                    }
                                                }
                                            }
                                            ?>
                                        </div>
                                <?php
                                    }
                                }
                                ?>
                                <p class="link-secondary mb-1" style="font-size: 12px;text-align: right;padding: 0;margin-top: -10px;">
                                    <?= $dk['tgl'] ?></p>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                    <!-- <div class="input-group"> -->
                    <form action="komentar/simpan_komentar.php" method="POST" class="input-group" enctype="multipart/form-data">
                        <input type="hidden" name="idberita" value="<?= $dbrt['id'] ?>">
                        <input type="hidden" name="nama" value="<?= $_SESSION['nama'] ?>">
                        <label for="formFileMultiple">
                            <a class="btn btn-warning btn-sm d-flex align-items-center" rel="nofollow" style="height: 100%;"><i class="uil uil-paperclip link-light fs-5"></i></a>
                        </label>
                        <input type='file' id='formFileMultiple' name='listGambar[]' multiple>
                        <input type="text" class="form-control" placeholder="Ketik diskusi disini..." aria-label="Recipient's username" aria-describedby="button-addon2" name="komentar">
                        <button class="btn link-light " style="background-color: #960909;" type="submit" id="button-addon2"><i class="uil uil-message"></i></button>
                    </form>
                    <!-- </div> -->
                </div>
            </section>
        </div>
    </section>
    <!-- footer -->
    <footer style="margin-top: 0px;">
        <center>
            <img src="images/logo2.png" alt="logo" width="200px">
        </center>
    </footer>
    <!-- Akhir footer -->
    <!-- JQuery -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Slick JS -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.slider').slick({
                autoplay: true,
                autoplaySpeed: 2500,
                dots: true
            });
        });
    </script>
<?php
} elseif (isset($_GET['ktg'])) {
    // tampilkan berita berdasarkan kategori
    $sqlKtg = mysqli_query($konek, "SELECT * FROM kategori where id='$_GET[ktg]'");
    $ktg = mysqli_fetch_array($sqlKtg);
?>
    <section class="judul" style="margin-top: 150px;">
        <div class="container mt-5 bg-light p-4 shadow-sm rounded-3">
            <h3 class="fw-bold mb-4" style="color: #960909;">Diskusi - Kategori <?= $ktg['nm_kategori']; ?></h3>
            <ul>
                <?php
                $sqlBerita = mysqli_query($konek, "SELECT * FROM berita WHERE id_kategori='$_GET[ktg]' ORDER BY id DESC");
                while ($brt = mysqli_fetch_array($sqlBerita)) {
                    echo "
                        <li class='py-1'>
                            <a href='./?hal=diskusi&id=$brt[id]' class='text-decoration-none link-dark'>$brt[judul]</a>
                        </li>";
                }
                ?>
            </ul>
        </div>
    </section>
    <!-- footer -->
    <footer>
        <center>
            <img src="images/logo2.png" alt="logo" width="200px">
        </center>
    </footer>
    <!-- Akhir footer -->
<?php
} else {
    // tampilkan daftar berita
?>

<?php } ?>