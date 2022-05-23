<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UNIKA Discussion Forum</title>
    <link rel="icon" type="icon/x-image" href="images/title.png">
    <link rel="stylesheet" href="inc/style copy.css">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
</head>

<body>
    <nav>
        <div class="nav-brand">
            <img src="images/logo3.png">
        </div>
        <ul>
            <li><a href="#home">Home</a></li>
            <li><a href="#features">Features</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
            <li><a href="login.php" class="login">Login</a></li>
        </ul>
        <div class="menu-toggle">
            <input type="checkbox">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </nav>
    <section class="hero" id="home">
        <div class="content">
            <div class="desc">
                <h1>Ayo!! Mulai berdiskusi di UNIKA Discussion Forum</h1>
                <p>UNIKA Discussion Forum adalah layanan aplikasi yang diharapkan untuk seluruh Civitas Akademik mendapat informasi internal terkait Universitas Katolik Santo Thomas Medan dan sesama Civitas Akademik menjalin hubungan baik dan erat untuk mewujudkan Universitas yang berintegritas</p>
                <a href="login.php">Get Started <i class="las la-arrow-right"></i></a>
            </div>
            <div class="hero-image">
                <img src="images/hero.png" width="100%">
            </div>
        </div>

    </section>

    <section class="features" id="features">
        <div class="content">
            <div class="isi">
                <h1>Our Features</h1>
                <p>UNIKA Discussion Forum Mempunyai beberapa fitur yang kiranya dapat menyelesaikan <br>permasalahan Anda dengan sangat baik.</p>
            </div>
            <div class="items">
                <div class="card">
                    <div class="card-header">
                        <img class="orange" src="images/diskusi2.png">
                        <h4>Discussion</h4>
                    </div>
                    <div class="card-body">
                        <p>Tempat bertukar informasi atau pikiran lewat diskusi antar Civitas Akademik</p>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <img class="yellow" src="images/comment.png">
                        <h4>Comment</h4>
                    </div>
                    <div class="card-body">
                        <p>Berfungsi sebagai tanggapan atas diskusi antar sesama Civitas Akademik</p>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <img class="green" src="images/send-file.png">
                        <h4>Send File</h4>
                    </div>
                    <div class="card-body">
                        <p>Fitur yang dapat mengirim informasi dengan tulisan, file, foto ataupun video</p>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <img class="blue" src="images/easy-use.png">
                        <h4>Easy Use</h4>
                    </div>
                    <div class="card-body">
                        <p>Memungkinkan pengguna dalam menggunakan website secara mudah</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="about" id="about">
        <div class="content">
            <div class="isi">
                <h1>About Us</h1>
                <p>UNIKA Discussion Forum meningkatkan komunikasi antara Civitas Akademik Universitas Katolik Santo Thomas Medan secara online tanpa harus <br>bertatap muka ataupun meluangkan waktu yang banyak.Lewat website kami diharapkan dapat digunakan secara <br> optimal oleh seluruh Civitas Akademik Universitas Katolik Santo Thomas Medan</p>
            </div>
            <div class="items2">
                <div class="worker">
                    <img src="images/ferdinan3.jpeg" width="100px" height="100px">
                    <p>Ferdinan Imanuel Tumanggor</p>
                    <span>Project Manager, Developer</span>
                </div>
                <div class="worker">
                    <img src="images/foto.jpg" width="100px" height="100px">
                    <p>Samuel Doli Hasian Manihuruk</p>
                    <span>Project Analyst</span>
                </div>
                <div class="worker">
                    <img src="images/foto.jpg" width="100px" height="100px">
                    <p>Dionisius Siahaan</p>
                    <span>Project Analyst</span>
                </div>
                <div class="worker">
                    <img src="images/chris.jpg" width="100px" height="100px">
                    <p>Christ Jordan Baeha</p>
                    <span>Project Analyst</span>
                </div>
                <div class="worker">
                    <img src="images/foto.jpg" width="100px" height="100px">
                    <p>Yosia Silalahi</p>
                    <span>Project Analyst</span>
                </div>
                <div class="worker">
                    <img src="images/foto.jpg" width="100px" height="100px">
                    <p>Samuel Doli Hasian Manihuruk</p>
                    <span>Project Analyst</span>
                </div>
            </div>
        </div>
    </section>
    <section class="contact" id="contact">
        <div class="content">
            <div class="isi">
                <h1>Contact Us</h1>
                <p>Looking to spend more time at the UNIKA Discussion Forum? We’d love to hear from you. <br>Feel free to contact us and we will get back to you as soon as possible.</p>
            </div>
            <form action="">
                <table>
                    <tr>
                        <td><label for="nama">Nama</label></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="nama" id="nama"></td>
                    </tr>
                    <tr>
                        <td><label for="nama">Email</label></td>
                    </tr>
                    <tr>
                        <td><input type="email" name="email" id="email"></td>
                    </tr>
                    <tr>
                        <td><label for="nama">Pesan</label></td>
                    </tr>
                    <tr>
                        <td><textarea name="pesan" id="pesan" cols="30" rows="10"></textarea></td>
                    </tr>
                    <tr>
                        <td><input type="submit" value="Send Message"></td>
                    </tr>
                </table>
            </form>
        </div>

    </section>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#800000" fill-opacity="1" d="M0,160L48,149.3C96,139,192,117,288,133.3C384,149,480,203,576,208C672,213,768,171,864,165.3C960,160,1056,192,1152,197.3C1248,203,1344,181,1392,170.7L1440,160L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
        </path>
    </svg>
    <footer>
        <center><img src="images/footer.png">
            <p>Copyright © 2022 Made with 💛 Ferdinan Imanuel Tumanggor</p>
        </center>
    </footer>
    <script>
        window.addEventListener("scroll", function() {
            const navbar = document.querySelector("nav");
            navbar.classList.toggle("sticky", window.scrollY > 0);
        })

        const slide = document.querySelector('.menu-toggle input');
        const nav = document.querySelector('nav ul');
        slide.addEventListener('click', function() {
            nav.classList.toggle('slide');
        })
    </script>
</body>

</html>