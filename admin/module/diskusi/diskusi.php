<?php
if (isset($_GET['tipe'])) {
    if ($_GET['tipe'] == 'tambah') {
        echo "
        <section class='posting mt-4'>
            <h5 class='fw-bold' style='color: maroon;'>Tulis Posting Diskusi Baru</h5>
            <hr>
            <form method='post' action='../../diskusi/proses_tambah.php' enctype='multipart/form-data'>
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
                    <textarea class='form-control' name='isi' style='height: 500px;'></textarea>
                </div>
                <div class='mb-3 mt-4'>
                                <input class='form-control' type='file' id='formFileMultiple' name='listGambar[]' multiple>
                            </div>
                <input type='submit' class='btn link-light my-3' style='background-color: maroon;' value='Simpan'>
                <input type='button' class='btn link-dark bg-light my-3' value='Batal' onclick='history.back();'>
            </form>
    </section>
        ";
    } elseif ($_GET['tipe'] == 'edit') {
        $sql = mysqli_query($konek, "SELECT berita.*,kategori.nm_kategori
        FROM berita INNER JOIN kategori ON berita.id_kategori=kategori.id WHERE berita.id='$_GET[id]'");
        $de = mysqli_fetch_array($sql);
        echo "
        <section class='f-berita mt-4'>
            <h5 class='fw-bold' style='color: maroon;'>Edit Diskusi</h5>
            <hr>
            <form method='post' action='../../diskusi/proses_edit.php' enctype='multipart/form-data'>
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
            <textarea class='form-control' name='isi' style='height: 500px;'>$de[isi]</textarea>
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
                            echo "<img src='../../images/word (2).png' width='50px' class='pt-2'>";
                        } elseif ($ekstensi == 'rar') {
                            echo "<img src='../../images/word (2).png' width='50px' class='pt-2'>";
                        } elseif ($ekstensi == 'docx') {
                            echo "<img src='../../images/word (2).png' width='50px' class='pt-2'>";
                        } elseif ($ekstensi == 'pdf') {
                            echo "<img src='../../images/word (2).png' width='50px' class='pt-2'>";
                        } elseif ($ekstensi == 'ppt') {
                            echo "<img src='../../images/word (2).png' width='50px' class='pt-2'>";
                        } elseif ($ekstensi == 'pptx') {
                            echo "<img src='../../images/word (2).png' width='50px' class='pt-2'>";
                        } elseif ($ekstensi == 'MP4') {
                            echo "<img src='../../images/word (2).png' width='50px' class='pt-2'>";
                        } elseif ($ekstensi == 'xlsx') {
                            echo "<img src='../../images/word (2).png' width='50px' class='pt-2'>";
                        } elseif ($ekstensi == 'jpg') {
                            echo "<img src='../../images/img.png' width='50px' class='pt-2'>";
                        }
                    }
                    ?>
                    <div class='card-body'>
                        <center>
                            <p class='card-text pb-2' style="font-size: small;text-overflow: ellipsis " [..]";"><?= $files['nama']; ?></p>
                        </center>
                        <center><a href='../../diskusi/hapus_file.php?id=<?= $files['id'] ?>' class='btn btn-danger' style="font-size: small;">Hapus</a></center>
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
    </section>
    ";
    }
} else {
    ?>
    <h1 class="mt-4">Diskusi</h1>
    <a href="?m=diskusi&tipe=tambah"><button class="btn mb-4 link-light mt-4" type="button" style="background-color: #960909;">
            <i class="uil uil-plus"></i> Tambah Diskusi</button></a>
    <table class="table table-striped" style="width:  100%; text-align: center;">
        <thead></thead>
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Judul</th>
                <th scope="col">Aksi</th>
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
                    <td>
                        <a href='?m=diskusi&tipe=edit&id=$k[id]' class='btn btn-primary'>Edit</a>
                        <a onclick='confirm(\"Anda yakin akan menghapus?\")' href='../../diskusi/proses_hapus.php?id=$k[id]' class='btn btn-danger'>Hapus</a>
                    </td>
                </tr>";
                $no++;
            }
            ?>
        </tbody>
    </table>
<?php } ?>