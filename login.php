<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="inc/login.css">
    <title>UNIKA Discussion Forum</title>
    <link rel="icon" type="icon/x-image" href="images/title.png">

</head>

<body>
    <main>
        <div class="box">
            <div class="inner-box">
                <div class="forms-wrap">
                    <?php
                    include "inc/config.php";
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        $pass = md5($_POST['password']);
                        $sqlCek = mysqli_query($konek, "SELECT * FROM user WHERE username='$_POST[username]' AND password='$pass' AND aktif='Y'");

                        $jml = mysqli_num_rows($sqlCek);
                        $d = mysqli_fetch_array($sqlCek);

                        if ($jml > 0) {

                            if ($d['level'] == "admin") {
                                session_start();
                                $_SESSION['login'] = true;
                                $_SESSION['id'] = $d['id'];
                                $_SESSION['username'] = $d['username'];
                                $_SESSION['nama'] = $d['nama_lengkap'];
                                $_SESSION['level'] = $d['level'];
                                $_SESSION['lokasi'] = $d['lokasi'];
                                header('location:admin/module/dashboard.php');
                            } elseif ($d['level'] != "admin") {
                                session_start();
                                $_SESSION['login'] = true;
                                $_SESSION['id'] = $d['id'];
                                $_SESSION['username'] = $d['username'];
                                $_SESSION['nama'] = $d['nama_lengkap'];
                                $_SESSION['level'] = $d['level'];
                                $_SESSION['lokasi'] = $d['lokasi'];
                                header('Location:user/index.php');
                            } else {
                                echo "<script>alert('username dan password salah');</script>";
                            }
                        } else {
                            echo "<script>alert('username dan password salah');</script>";
                        }
                    }
                    ?>
                    <form action="" method="post" name="login" autocomplete="off" class="sign-in-form">
                        <div class="logo">
                            <img src="images/logo3.png" alt="easyclass" />
                        </div>
                        <div class="heading">
                            <h2>Login</h2>
                            <h6>Not registred yet?</h6>
                            <a href="http://pmb.ust.ac.id/" target="_blank" class="daftar">Sign up</a>
                        </div>

                        <div class="actual-form">
                            <div class="input-wrap">
                                <input type="text" name="username" id="username" minlength="4" class="input-field" autocomplete="off" required />
                                <label>Username</label>
                            </div>

                            <div class="input-wrap">
                                <input type="password" name="password" id="password" minlength="4" class="input-field" autocomplete="off" required />
                                <label>Password</label>
                            </div>
                            <label for="">&nbsp;</label>
                            <input type="submit" value="Login" class="sign-btn" />
                        </div>
                    </form>
                </div>

                <div class="carousel">
                    <div class="images-wrapper">
                        <img src="images/image1.png" class="image img-1 show" />
                        <img src="images/image3.png" class="image img-2" />
                        <img src="images/image2.png" class="image img-3" />
                    </div>

                    <div class="text-slider">
                        <div class="text-wrap">
                            <div class="text-group">
                                <h2>UNIKA DISCUSSION FORUM</h2>
                                <h2>UNIKA DISCUSSION FORUM</h2>
                            </div>
                        </div>

                        <div class="bullets">
                            <span class="active" data-value="1"></span>
                            <span data-value="2"></span>
                            <span data-value="3"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Javascript file -->

    <script src="inc/login.js"></script>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>