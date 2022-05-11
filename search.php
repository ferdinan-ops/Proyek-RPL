<?php
include "inc/config.php";

if (!empty($_POST['teks'])) {
    $teks = $_POST['teks']
    // $sqlSearch = mysqli_query($konek, "SELECT * FROM berita WHERE judul LIKE '%$teks%'");
    // $search = mysqli_fetch_array($sqlSearch);
?>
    <section class="judul" style="margin-top: 150px;">
        <div class="container mt-5 bg-light p-4 shadow-sm rounded-3">
            <h3 class="fw-bold mb-4" style="color: #960909;">Diskusi</h3>
            <ul>
                <?php
                $sqlSearch = mysqli_query($konek, "SELECT * FROM berita WHERE judul LIKE '%$teks%'");
                while ($search = mysqli_fetch_array($sqlSearch)) {
                    echo "
                        <li class='py-1'>
                            <a href='./?hal=diskusi&id=$search[id]' class='text-decoration-none link-dark'>$search[judul]</a>
                        </li>";
                }
                ?>
            </ul>
        </div>
    </section>
    <!-- footer -->
    <footer style='position: absolute;bottom: 0;width: 100%;'>
        <center>
            <img src="images/logo2.png" alt="logo" width="200px">
        </center>
    </footer>
    <!-- Akhir footer -->
<?php
}

?>