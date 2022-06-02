<h1 class="my-4">Pesan Non User</h1>
<table class="table table-striped" style="width:  100%; text-align: center;">
    <thead></thead>
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Nama</th>
            <th scope="col">email</th>
            <th scope="col">Pesan</th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $sql = mysqli_query($konek, "SELECT * FROM pesan ORDER BY id asc");
        $no = 1;
        while ($k = mysqli_fetch_array($sql)) {
            echo "<tr>
                    <td>$no</td>
                    <td>$k[nama]</td>
                    <td>$k[email]</td>
                    <td>
                    <!-- Button trigger modal -->
                    <button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#staticBackdrop$no'>
                        Lihat Pesan
                    </button>
                    
                    <!-- Modal -->
                    <div class='modal fade' id='staticBackdrop$no' data-bs-backdrop='static' data-bs-keyboard='false' tabindex='-1' aria-labelledby='staticBackdropLabel' aria-hidden='true'>
                        <div class='modal-dialog modal-dialog-centered'>
                            <div class='modal-content'>
                            <div class='modal-header'>
                                <h5 class='modal-title' id='staticBackdropLabel'>Pesan</h5>
                                <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                            </div>
                            <div class='modal-body'>
                                $k[pesan]
                            </div>
                            <div class='modal-footer'>
                                <button type='button' class='btn btn-danger' data-bs-dismiss='modal'>Close</button>
                            </div>
                            </div>
                        </div>
                    </div>
                    </td>
                    <td>
                        <a onclick='confirm(\"Anda yakin akan menghapus?\")' href='contact/proses_hapus.php?id=$k[id]' class='btn btn-danger'>Hapus</a>
                    </td>
                </tr>
                
                ";
            $no++;
        }
        ?>

    </tbody>
</table>