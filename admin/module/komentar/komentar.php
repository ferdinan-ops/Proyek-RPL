<?php
if (isset($_GET['tipe'])) {
} else {
?>
    <h1 class="my-4">Komentar</h1>
    <table class="table table-striped" style="width:  100%; text-align: center;">
        <thead></thead>
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Kategori</th>
                <th scope="col">Isi Komentar</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = mysqli_query($konek, "SELECT*FROM komentar ORDER BY nama asc");
            $no = 1;
            while ($k = mysqli_fetch_array($sql)) {
                echo "<tr>
                    <td>$no</td>
                    <td>$k[nama]</td>
                    <td>
                    <!-- Button trigger modal -->
                    <button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#staticBackdrop$no'>
                        Detail
                    </button>
                    
                    <!-- Modal -->
                    <div class='modal fade' id='staticBackdrop$no' data-bs-backdrop='static' data-bs-keyboard='false' tabindex='-1' aria-labelledby='staticBackdropLabel' aria-hidden='true'>
                        <div class='modal-dialog modal-dialog-centered'>
                            <div class='modal-content'>
                                <div class='modal-header'>
                                    <h5 class='modal-title' id='staticBackdropLabel'>Isi Komentar</h5>
                                    <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                </div>
                                <div class='modal-body'>
                                    $k[komentar]
                                </div>
                            </div>
                        </div>
                    </div>
                    </td>
                    <td>
                        <a onclick='confirm(\"Anda yakin akan menghapus?\")' href='komentar/proses_hapus.php?id=$k[id]' class='btn btn-danger'>Hapus</a>
                    </td>
                </tr>";
                $no++;
            }
            ?>
        </tbody>
    </table>
<?php } ?>