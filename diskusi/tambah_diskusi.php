<?php
if (isset($_GET['hal'])) {
    if ($_GET['hal'] == "tambahdiskusi") {
        echo "
        <section class='posting mt-4' style='margin-top: 120px !important;'>
            <div class='container'>
                <div class='card'>
                    <div class='card-header'>
                        <h5 class='fw-bold pt-2' style='color: #960909;'>Tulis Posting Diskusi Baru</h5>
                    </div>
                    <div class='card-body'>
                        <form method='post' action='diskusi/proses_tambah.php' enctype='multipart/form-data'>
                            <div class='my-3'>
                                <label for='judul' class='form-label'>Judul Diskusi</label>
                                <input type='text' class='form-control' name='judul' placeholder='Masukkan Judul Diskusi'>
                            </div>
                            <div class='my-3'>
                                <label for='kategori' class='mb-2'>Kategori Diskusi</label>
                                <select class='form-select' name='kategori'>
                                    ";
        $sql = mysqli_query($konek, "SELECT * FROM kategori ORDER BY nm_kategori ASC");
        while ($k = mysqli_fetch_array($sql)) {
            echo "<option value='$k[id]'>$k[nm_kategori]</option>";
        };
        echo "
                                </select>
                            </div>
                            <div class='my-3'>
                                <label for='diskusi' class='mb-2'>Isi Diskusi</label>
                                <textarea class='form-control summernote' name='isi' style='height: 300px;'></textarea>
                            </div>
                            <div class='mb-3 mt-4'>
                                <input class='form-control' type='file' id='formFileMultiple' name='listGambar[]' multiple>
                            </div>
                            <input type='submit' class='btn link-light my-3' style='background-color: maroon;' value='Simpan'>
                            <input type='button' class='btn link-dark bg-light my-3' value='Batal' onclick='history.back();'>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- footer -->
        <footer>
            <center>
                <img src=images/logo2.png alt=logo width=200px>
            </center>
        </footer>
        <!-- Akhir footer -->
    ";
    } elseif ($_GET['hal'] == 'editdiskusi') {
        $sql = mysqli_query($konek, "SELECT berita.*,kategori.nm_kategori
        FROM berita INNER JOIN kategori ON berita.id_kategori=kategori.id WHERE berita.id='$_GET[id]'");
        $de = mysqli_fetch_array($sql);
        echo "
        <section class='f-berita mt-4' style='margin-top: 150px !important;'>
        <div class='container'>
            <div class='card'>
                <div class='card-header'>
                    <h5 class='fw-bold pt-2' style='color: maroon;'>Edit Diskusi</h5>
                </div>
                <div class='card-body'>
                    <form method='post' action='diskusi/proses_edit.php' enctype='multipart/form-data'>
                        <input type='hidden' name='id' value='$de[id]'>
                        <div class='my-3'>
                            <label for='judul' class='form-label'>Judul Diskusi</label>
                            <input type='text' class='form-control' name='judul' placeholder='Masukkan Judul Diskusi' value='$de[judul]'>
                        </div>
                        <div class='my-3'>
                            <label for='kategori' class='mb-2'>Kategori Diskusi</label>
                            <select class='form-select' name='kategori'>
                            <option value='$de[id_kategori]'>$de[nm_kategori]</option>
                            ";
        $sql = mysqli_query($konek, "SELECT * FROM kategori ORDER BY nm_kategori ASC");
        while ($k = mysqli_fetch_array($sql)) {
            echo "<option value='$k[id]'>$k[nm_kategori]</option>";
        };
        echo "
                            </select>
                        </div>
                        <div class='my-3'>
                            <label for='diskusi' class='mb-2'>Isi Diskusi</label>
                            <textarea class='form-control summernote' name='isi' style='height: 500px;'>$de[isi]</textarea>
                        </div>
                        <div class='my-3'>
                            <label for='judul' class='form-label'>File Hapus</label>
                            ";
?>
        <div class='file d-flex flex-wrap bg-secondary p-3 rounded justify-content-lg-start justify-content-between overflow-auto' style="width: 100%; height: 210px;">
            <?php
            $sqlFile = mysqli_query($konek, "SELECT * FROM file  WHERE id_berita='$_GET[id]'");
            while ($files = mysqli_fetch_array($sqlFile)) {
            ?>

                <div class='card isi d-flex align-items-center flex-column me-lg-2 mb-lg-0 mb-2' style='width: 145px;'>
                    <!-- <img src='images/word (2).png' width="50px" class="pt-2"> -->
                    <?php

                    if (!empty($files['nama'])) {
                        $pecah = explode(".", $files['nama']);
                        $ekstensi = $pecah[1];
                        if ($ekstensi == 'zip') {
                            echo "<img src='images/word (2).png' width='50px' class='pt-2'>";
                        } elseif ($ekstensi == 'rar') {
                            echo "<img src='images/word (2).png' width='50px' class='pt-2'>";
                        } elseif ($ekstensi == 'docx') {
                            echo "<img src='images/word (2).png' width='50px' class='pt-2'>";
                        } elseif ($ekstensi == 'pdf') {
                            echo "<img src='images/word (2).png' width='50px' class='pt-2'>";
                        } elseif ($ekstensi == 'ppt') {
                            echo "<img src='images/word (2).png' width='50px' class='pt-2'>";
                        } elseif ($ekstensi == 'pptx') {
                            echo "<img src='images/word (2).png' width='50px' class='pt-2'>";
                        } elseif ($ekstensi == 'MP4') {
                            echo "<img src='images/word (2).png' width='50px' class='pt-2'>";
                        } elseif ($ekstensi == 'xlsx') {
                            echo "<img src='images/word (2).png' width='50px' class='pt-2'>";
                        } elseif ($ekstensi == 'jpg' || 'jpeg' || 'png' || 'gif') {
                            echo "<img src='images/img.png' width='50px' class='pt-2'>";
                        }
                    }
                    ?>
                    <div class='card-body'>
                        <center>
                            <p class='card-text pb-2' style="font-size: small;text-overflow: ellipsis " [..]";"><?= $files['nama']; ?></p>
                        </center>
                        <center><a href='./diskusi/hapus_file.php?id=<?= $files['id'] ?>&idb=<?= $_GET['id'] ?>' class='btn btn-danger' style="font-size: small;">Hapus</a></center>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    <?php
        echo "
        
                        </div>
                        <div class='mb-3 mt-4'>
                            <input class='form-control' type='file' id='formFileMultiple' name='listGambar[]' multiple>
                        </div>
                        <label>&nbsp;</label>
                        <input type='submit' class='btn link-light my-3' style='background-color: maroon;' value='Update'>
                        <input type='button' class='btn link-dark bg-light my-3' value='Batal' onClick='history.back();'>
                    </form>
                </div>
            </div>
            
        </div>
    </section>
    <!-- footer -->
        <footer style=position: absolute;bottom: 0;width: 100%;>
            <center>
                <img src=images/logo2.png alt=logo width=200px>
            </center>
        </footer>
        <!-- Akhir footer -->
    ";
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

            <form class="d-flex" style="width: 85%;">
                <input class="form-control" type="search" placeholder="Cari Diskusi Disini" aria-label="Search" style="width: 100%;">
                <button class="btn link-light" type="submit" style="background-color: #960909;"><i class="uil uil-search"></i>
                </button>
            </form>
        </div>
    </section>
    <!-- Akhir Kategori Menu -->
    <section class="judul">
        <div class="container mt-5 bg-light p-4 shadow-sm rounded-3">
            <h3 class="fw-bold mb-4" style="color: #960909;">Diskusi Terbaru</h3>
            <ul>
                <?php
                $sqlBerita = mysqli_query($konek, "SELECT * FROM berita ORDER BY id DESC");
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

    <!-- judul diskusi -->
    <!-- footer -->
    <footer>
        <center>
            <img src="images/logo2.png" alt="logo" width="200px">
        </center>
    </footer>
    <!-- Akhir footer -->
    ";
<?php } ?>