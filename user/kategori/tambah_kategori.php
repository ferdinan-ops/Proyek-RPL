<?php
if (isset($_GET['hal'])) {
    if ($_GET['hal'] == 'tambahkategori') {
        echo "
        <section class='f-kategori mt-4' style='margin-top: 150px !important;'>
        <div class='container bg-light p-4'>
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
            </div>
    </section>
    <!-- footer -->
        <footer style='position: absolute;bottom: 0;width: 100%;'>
            <center>
                <img src='../images/footer.png' alt='logo' width='200px'>
            </center>
        </footer>
        <!-- Akhir footer -->
        ";
    }
} else {
?>
    <!-- Tambah Kategori -->
    <section class="t-kategori" style="margin-top: 120px; margin-bottom: 0px;">
        <div class="container bg-light p-5">
            <h3 class="fw-bold">Category</h3>
            <a href="../?hal=tambahkategori"><button class="btn shadow-lg link-light mt-4" type="button" style="background-color: #960909;">
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
    <!-- footer -->
    <footer>
        <center>
            <img src="../images/footer.png" alt="logo" width="200px">
        </center>
    </footer>
    <!-- Akhir footer -->
    <!-- Akhir tambah kategori -->
<?php } ?>