<?php
if (isset($_GET['tipe'])) {
    if ($_GET['tipe'] == 'tambah') {
        echo "
        <section class='posting mt-4'>
            <h5 class='fw-bold' style='color: maroon;'>Tulis User Baru</h5>
            <hr>
            <form method='post' action='user/proses_tambah.php' enctype='multipart/form-data'>
                <div class='my-3'>
                    <label for='' class='form-label'>Username</label>
                    <input type='text' class='form-control' name='username' placeholder='Masukkan username'>
                </div>
                <div class='my-3'>
                    <label for='' class='form-label'>Password</label>
                    <input type='password' class='form-control' name='password' placeholder='Masukkan password'>
                </div>
                <div class='my-3'>
                    <label for='' class='form-label'>Nama Lengkap</label>
                    <input type='text' class='form-control' name='nama' placeholder='Masukkan nama lengkap'>
                </div>
                <div class='my-3'>
                    <label for='' class='form-label'>Email</label>
                    <input type='email' class='form-control' name='email' placeholder='Masukkan email'>
                </div>
                <div class='my-3'>
                    <label for='' class='form-label'>No.Telp</label>
                    <input type='text' class='form-control' name='notelp' placeholder='Masukkan no.telp'>
                </div>
                <div class='my-3'>
                    <label for='level' class='mb-2'>Level</label>
                    <select class='form-select' name='level'>
                    <option>admin</option>
                    <option>Mahasiswa</option>
                    <option>Dosen</option>
                    <option>Rektor</option>
                    <option>Wakil Rektor</option>
                    <option>Pegawai</option>
                    <option>Lainnya</option>
                    </select>
                </div>
                <div class='my-3'>
                    <label for='aktif' class='mb-2'>Keaktifan</label>
                    <select class='form-select' name='aktif'>
                    <option>Y</option>
                    <option>N</option>
                    </select>
                </div>
                <div class='my-3'>
                    <label for='' class='form-label'>Foto</label><br>
                    <input class='form-control' type='file' id='img' name='img' accept='image/*'>
                </div>
                <input type='submit' class='btn link-light my-3' style='background-color: maroon;' value='Simpan'>
                <input type='button' class='btn link-dark bg-light my-3' value='Batal' onclick='history.back();'>
            </form>
    </section>
    <script type='text/javascript'>
                            var uploadField = document.getElementById('img');
                            uploadField.onchange = function() {
                                if (this.files[0].size > 1000000) { // ini untuk ukuran 800KB, 1000000 untuk 1 MB.
                                    alert('Maaf. File Terlalu Besar ! Maksimal Upload 1 MB');
                                    this.value = '';
                                };
                            };
                        </script>
        ";
    } elseif ($_GET['tipe'] == 'edit') {
        $sql = mysqli_query($konek, "SELECT * FROM user WHERE id='$_GET[id]'");
        $de = mysqli_fetch_array($sql);
        echo "
        <section class='posting mt-4'>
            <h5 class='fw-bold' style='color: maroon;'>Edit Data User</h5>
            <hr>
            <form method='post' action='user/proses_edit.php' enctype='multipart/form-data'>
            <input type='hidden' name='id' value='$de[id]'>
                <div class='my-3'>
                    <label for='' class='form-label'>Username</label>
                    <input type='text' class='form-control' name='username' placeholder='Masukkan username' value='$de[username]'>
                </div>
                <div class='my-3'>
                    <label for='' class='form-label'>Password</label>
                    <input type='password' class='form-control' name='password' placeholder='Masukkan password' value='$de[password]'>
                </div>
                <div class='my-3'>
                    <label for='' class='form-label'>Nama Lengkap</label>
                    <input type='text' class='form-control' name='nama' placeholder='Masukkan nama lengkap' value='$de[nama_lengkap]'>
                </div>
                <div class='my-3'>
                    <label for='' class='form-label'>Email</label>
                    <input type='email' class='form-control' name='email' placeholder='Masukkan email' value='$de[email]'>
                </div>
                <div class='my-3'>
                    <label for='' class='form-label'>No.Telp</label>
                    <input type='text' class='form-control' name='notelp' placeholder='Masukkan no.telp' value='$de[telp]'>
                </div>
                <div class='my-3'>
                    <label for='level' class='mb-2'>Level</label>
                    <select class='form-select' name='level'>
                    <option>$de[level]</option>
                    <option>admin</option>
                    <option>Mahasiswa</option>
                    <option>Dosen</option>
                    <option>Rektor</option>
                    <option>Wakil Rektor</option>
                    <option>Pegawai</option>
                    <option>Lainnya</option>
                    </select>
                </div>
                <div class='my-3'>
                    <label for='aktif' class='mb-2'>Keaktifan</label>
                    <select class='form-select' name='aktif'>
                    <option>$de[aktif]</option>
                    <option>Y</option>
                    <option>N</option>
                    </select>
                </div>
                <div class='my-3'>
                    <label for='' class='form-label'>Foto</label><br>
                    <img src='user/$de[lokasi]' class='me-3' width='100px'>
                    <input type='file' id='img' name='img' accept='image/*'>
                </div>
                <label>&nbsp;</label>
                <input type='submit' class='btn link-light my-3' style='background-color: maroon;' value='Update'>
                <input type='button' class='btn link-dark bg-light my-3' value='Batal' onClick='history.back();'>
            </form>
    </section>
                        <script type='text/javascript'>
                            var uploadField = document.getElementById('img');
                            uploadField.onchange = function() {
                                if (this.files[0].size > 1000000) { // ini untuk ukuran 800KB, 1000000 untuk 1 MB.
                                    alert('Maaf. File Terlalu Besar ! Maksimal Upload 1 MB');
                                    this.value = '';
                                };
                            };
                        </script>
    ";
    }
} else {
?>
    <h1 class="mt-4">User</h1>
    <a href="?m=user&tipe=tambah"><button class="btn mb-4 link-light mt-4" type="button" style="background-color: #960909;">
            <i class="uil uil-plus"></i> Tambah User</button></a>
    <table class="table table-striped" style="width:  100%; text-align: center;">
        <thead></thead>
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama User</th>
                <th scope="col">Level</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = mysqli_query($konek, "SELECT*FROM user  ORDER BY id ASC");
            $no = 1;
            while ($k = mysqli_fetch_array($sql)) {
                echo "<tr>
                    <td>$no</td>
                    <td>$k[nama_lengkap]</td>
                    <td>$k[level]</td>
                    <td>
                        <a href='?m=user&tipe=edit&id=$k[id]' class='btn btn-primary'>Edit</a>
                        <a onclick='confirm(\"Anda yakin akan menghapus?\")' href='user/proses_hapus.php?id=$k[id]' class='btn btn-danger'>Hapus</a>
                    </td>
                </tr>";
                $no++;
            }
            ?>
        </tbody>
    </table>
<?php } ?>