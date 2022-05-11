<?php
session_start();
if (isset($_GET['id'])) {
    $sqlUser = mysqli_query($konek, "SELECT * FROM user WHERE id='$_GET[id]'");
    $user = mysqli_fetch_array($sqlUser);
?>

    <head>
    </head>

    <body>
        <!-- User -->
        <section class="user" style="margin:150px 0 100px">
            <div class="container d-flex justify-content-around bg-light p-5 rounded flex-column flex-lg-row shadow">
                <div class="profil me-lg-5 me-0">
                    <div class="foto-profil d-flex flex-column justify-content-center align-items-center">
                        <img src="admin/module/user/<?= $user['lokasi']; ?>" class="rounded-circle shadow" alt="foto-profil" width="200px" height="200px">
                        <p style="text-align: center;margin-top: 10px;" class="p-2 fw-bold"><?= $user['nama_lengkap']; ?></p>
                        <p class="link-secondary" style="font-size: small; margin-top: -15px;"><?= $user['level']; ?></p>
                    </div>
                </div>
                <div class="dashboard mt-5 mt-lg-0">
                    <div class="head mb-0">
                        <p class="p-2 fs-5 fw-bold text-center">Diskusi <?= $user['nama_lengkap'] ?></p>
                    </div>
                    <div class="body bg-light d-flex justify-content-between p-lg-4 flex-column flex-lg-row">
                        <table class="table table-striped" style="width:  100%; text-align: center;">
                            <thead></thead>
                            <thead>
                                <tr>
                                    <th scope="col">Judul</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = mysqli_query($konek, "SELECT*FROM berita WHERE id_user=$user[id] ORDER BY judul asc");
                                while ($k = mysqli_fetch_array($sql)) {
                                    echo "<tr>
                    <td><a href='./?hal=diskusi&id=$k[id]' class:'ubah'>$k[judul]</a></td>
                </tr>";
                                }
                                ?>
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </section>
        <!-- Akhir User -->

        <!-- footer -->
        <footer>
            <center>
                <img src="images/logo2.png" alt="logo" width="200px">
            </center>
        </footer>
        <!-- Akhir footer -->

    </body>
<?php
} else {

?>

    <head>
    </head>

    <body>
        <!-- User -->
        <section class="user" style="margin:150px 0 100px">
            <div class="container d-flex justify-content-around bg-light p-5 rounded flex-column flex-lg-row shadow">
                <div class="profil me-lg-5 me-0">
                    <div class="foto-profil d-flex flex-column justify-content-center align-items-center">
                        <img src="admin/module/user/<?= $_SESSION['lokasi']; ?>" class="rounded-circle shadow" alt="foto-profil" width="200px" height="200px">
                        <p style="text-align: center;margin-top: 10px;" class="p-2 fw-bold"><?= $_SESSION['nama']; ?></p>
                        <p class="link-secondary" style="font-size: small; margin-top: -15px;"><?= $_SESSION['level']; ?></p>
                    </div>
                    <div class="menu d-flex flex-column bg-light justify-content-center align-items-center">
                        <a href="./?hal=profile&m=home" class="p-2 text-decoration-none link-dark border fs-6" style="width: 100%;"><i class="uil uil-estate pe-3 fs-5"></i>Beranda</a>
                        <a href="./?hal=profile&m=ganti" class="p-2 text-decoration-none link-dark border fs-6" style="width: 100%;"><i class="uil uil-user-circle pe-3 fs-5"></i>Profil
                            Saya</a>
                        <a href="./?hal=profile&m=password" class="p-2 text-decoration-none link-dark border fs-6" style="width: 100%;"><i class="uil uil-lock pe-3 fs-5"></i>Ganti
                            Password</a>
                        <a href="logout.php" class="p-2 text-decoration-none link-dark border fs-6" style="width: 100%;"><i class="uil uil-signout pe-3 fs-5    "></i>Keluar</a>
                    </div>
                </div>
                <div class="dashboard mt-5 mt-lg-0" style="width: 100%;">
                    <?php
                    $sqlUser = mysqli_query($konek, "SELECT * FROM user WHERE id='$_SESSION[id]'");
                    $user = mysqli_fetch_array($sqlUser);
                    if ($_GET['m'] == 'ganti') {
                    ?>
                        <div class="head mb-0">
                            <p class="p-2 fs-5 fw-bold text-center">Edit Profile</p>
                        </div>
                        <div class="body bg-light p-lg-4">
                            <form method='post' action='profile/proses_update.php' enctype="multipart/form-data">
                                <div class='my-3'>
                                    <input type="hidden" name="id" value="<?= $user['id'] ?>">
                                    <label for='' class='form-label'>Nama Lengkap</label>
                                    <input type='text' class='form-control' name='nama' placeholder='Masukkan nama lengkap' value="<?= $user['nama_lengkap']; ?>">
                                </div>
                                <div class='my-3'>
                                    <label for='' class='form-label'>Email</label>
                                    <input type='email' class='form-control' name='email' placeholder='Masukkan email ' value="<?= $user['email']; ?>">
                                </div>
                                <div class='my-3'>
                                    <label for='' class='form-label'>No.Telp</label>
                                    <input type='text' class='form-control' name='notelp' placeholder='Masukkan no.telp ' value="<?= $user['telp']; ?>">
                                </div>
                                <div class='my-3'>
                                    <label for='' class='form-label'>Foto</label><br>
                                    <img src="admin/module/user/<?= $_SESSION['lokasi']; ?>" class="me-3" width="100px">
                                    <input type="file" id="img" name="img" accept="image/*">
                                </div>
                                <input type='submit' class='btn link-light my-3' style='background-color: maroon;' value='Simpan'>
                                <input type='button' class='btn link-dark bg-light my-3' value='Batal' onclick='history.back();'>
                            </form>
                        </div>
                    <?php
                    } elseif ($_GET['m'] == 'password') {
                    ?>
                        <div class="head mb-0">
                            <p class="p-2 fs-5 fw-bold text-center">Ganti Password</p>
                        </div>
                        <div class="body bg-light p-lg-4">
                            <form method='post' action='profile/ubah_password.php'>
                                <div class='my-3'>
                                    <label for='' class='form-label'>Password</label>
                                    <input type='password' class='form-control' name='password' placeholder='Masukkan password'>
                                </div>
                                <input type='submit' class='btn link-light my-3' style='background-color: maroon;' value='Simpan'>
                                <input type='button' class='btn link-dark bg-light my-3' value='Batal' onclick='history.back();'>
                            </form>
                        </div>
                    <?php
                    } elseif ($_GET['m'] == 'home') {
                    ?>
                        <div class="head mb-0">
                            <p class="p-2 fs-5 fw-bold text-center">Diskusi Anda</p>
                        </div>
                        <div class="body bg-lightp-lg-4">
                            <table class="table table-striped" style="width:  100%; text-align: center;">
                                <thead></thead>
                                <thead>
                                    <tr>
                                        <th scope="col">Judul</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql = mysqli_query($konek, "SELECT*FROM berita WHERE id_user=$_SESSION[id] ORDER BY tgl DESC");
                                    while ($k = mysqli_fetch_array($sql)) {
                                        echo "<tr>
                    <td>$k[judul]</td>
                    <td>
                        <a href='./?hal=editdiskusi&id=$k[id]' class='btn btn-primary'>Edit</a>
                        <a onclick='confirm(\"Anda yakin akan menghapus?\")' href='./diskusi/proses_hapus.php?id=$k[id]' class='btn btn-danger'>Hapus</a>
                    </td>
                </tr>";
                                    }
                                    ?>
                                </tbody>

                            </table>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </section>
        <!-- Akhir User -->

        <!-- footer -->
        <footer>
            <center>
                <img src="images/logo2.png" alt="logo" width="200px">
            </center>
        </footer>
        <!-- Akhir footer -->

    </body>
<?php
}
?>