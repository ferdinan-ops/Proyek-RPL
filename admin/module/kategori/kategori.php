<?php
if (isset($_GET['tipe'])) {
    if ($_GET['tipe'] == 'tambah') {
        echo "
        <section class='f-kategori mt-4'>
            <h5 class='fw-bold' style='color: maroon;'>Tambah Kategori Diskusi Baru</h5>
            <hr>
            <form method='post' action='kategori/proses_tambah.php'>
                <div class='my-3'>
                    <label for='judul' class='form-label'>Kategori</label>
                    <input type='text' name='kategori' class='form-control' id='judul' placeholder='Masukkan kategori diskusi'>
                </div>
                <label>&nbsp;</label>
                <input type='submit' class='btn link-light my-3' style='background-color: maroon;' value='Simpan'>
            <input type='button' class='btn link-dark bg-light my-3' value='Batal' onclick='history.back();'>
            </form>
    </section>
        ";
    } elseif ($_GET['tipe'] == 'edit') {
        $sql = mysqli_query($konek, "SELECT * FROM kategori WHERE id='$_GET[id]'");
        $de = mysqli_fetch_array($sql);
        echo "
        <section class='f-kategori mt-4'>
            <h5 class='fw-bold' style='color: maroon;'>Edit Kategori Diskusi</h5>
            <hr>
            <form method='post' action='kategori/proses_edit.php'>
                <div class='my-3'>
                <input type='hidden' name='id' value='$de[id]'>
                    <label for='judul' class='form-label'>Kategori</label>
                    <input type='text' name='kategori' class='form-control' id='judul' placeholder='Masukkan kategori diskusi' value='$de[nm_kategori]'>
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
    <h1 class="mt-4">Kategori</h1>
    <a href="?m=kategori&tipe=tambah"><button class="btn mb-4 link-light mt-4" type="button" style="background-color: #960909;">
            <i class="uil uil-plus"></i> Tambah Kategori</button></a>
    <table class="table table-striped" style="width:  100%; text-align: center;">
        <thead></thead>
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Kategori</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = mysqli_query($konek, "SELECT*FROM kategori ORDER BY nm_kategori asc");
            $no = 1;
            while ($k = mysqli_fetch_array($sql)) {
                echo "<tr>
                    <td>$no</td>
                    <td>$k[nm_kategori]</td>
                    <td>
                        <a href='?m=kategori&tipe=edit&id=$k[id]' class='btn btn-primary'>Edit</a>
                        <a onclick='confirm(\"Anda yakin akan menghapus?\")' href='kategori/proses_hapus.php?id=$k[id]' class='btn btn-danger'>Hapus</a>
                    </td>
                </tr>";
                $no++;
            }
            ?>
        </tbody>
    </table>
<?php } ?>