<?php
if (isset($_GET['tipe'])) {
    if ($_GET['tipe'] == 'edit') {
        $sql = mysqli_query($konek, "SELECT * FROM halaman WHERE id='$_GET[id]'");
        $de = mysqli_fetch_array($sql);
        echo "
        <section class='f-berita mt-4'>
            <h5 class='fw-bold' style='color: maroon;'>Edit Halaman</h5>
            <hr>
            <form method='post' action='halaman/proses_edit.php'>
            <input type='hidden' name='id' value='$de[id]'>
            <div class='my-3'>
            <label for='judul' class='form-label'>Judul Halaman</label>
            <input type='text' class='form-control' name='judul' placeholder='Masukkan Judul Diskusi' value='$de[judul]'>
        </div>
        <div class='my-3'>
            <label for='diskusi' class='mb-2'>Isi Halaman</label>
            <textarea class='form-control summernote' name='isi'>$de[isi]</textarea>
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
    <h1 class="mt-4">Halaman</h1>
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
            $sql = mysqli_query($konek, "SELECT*FROM halaman ORDER BY id asc");
            $no = 1;
            while ($k = mysqli_fetch_array($sql)) {
                echo "<tr>
                    <td>$no</td>
                    <td>$k[judul]</td>
                    <td>
                        <a href='?m=halaman&tipe=edit&id=$k[id]' class='btn btn-primary'>Edit</a>
                    </td>
                </tr>";
                $no++;
            }
            ?>
        </tbody>
    </table>
<?php } ?>