<?php
session_start();
include 'koneksi.php';
$query = mysqli_query($koneksi, "SELECT * FROM tb_login WHERE id_user = '" . $_SESSION['id'] . "'");
$u = mysqli_fetch_object($query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Beyoutips</title>
    <link rel="icon" type="image/x-icon" href="assets/img/logos/logo-dk.png" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v5.15.1/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
    <link href="css/main.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/card.css">
    <link rel="stylesheet" href="css/navbar.css">

</head>

<body id="page-top">
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand js-scroll-trigger" href="#page-top"><img src="img/logoo.png" alt="" /></a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars ml-1"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav text-uppercase ml-auto">
                    <li class="nav-item"><a class="nav-link" href="home.php">Beranda</a></li>
                    <div class="dropdown nav-item">
                        <a class="btn dropdown-toggle nav-link" type="button" id="dropdstylownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Kategori
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <?php
                            include 'koneksi.php';
                            $kate = mysqli_query($koneksi, "SELECT * FROM tb_kategori");
                            if (mysqli_num_rows($kate) > 0) {
                                while ($kte = mysqli_fetch_array($kate)) {
                            ?>
                                    <a class="dropdown-item" href="kategori.php?id=<?php echo $kte['id_kategori'] ?>"><?php echo $kte['kategori_nama'] ?></a>
                                <?php }
                            } else { ?>
                                <p>Tidak Ada Kategori</p>
                            <?php } ?>
                        </div>
                    </div>
                    <li class="nav-item"><a class="nav-link" href="profil.php">Profil</a></li>
                    <li class="nav-item"><a class="nav-link" href="pembelian.php">Pembelian Saya</a></li>
                    <li class="nav-item"><a class="nav-link " href="logout.php">Log-Out</a></li>
                    <li class="nav-item"><a href="" class="nav-link"><i class="fas fa-search"></i></a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="banner-2">
        <div class="imgSlider">
            <div class="figur">
            </div>
        </div>
        <span class="skewed"></span>
        <span class="skewedr"></span>
    </div>
    <div class="content-2">
        <div class="subCon page-section" id="portfolio">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Pembelian Saya</h2>
                <h3 class="section-subheading text-muted">Daftar pembelian anda</h3>
            </div>
            <div class="row ml-5 mr-5 tengah">
                <?php
                include 'koneksi.php';
                $tampil = mysqli_query($koneksi, "SELECT * FROM tb_beli INNER JOIN tb_produk ON tb_beli.id_produk = tb_produk.id_produk WHERE tb_beli.id_user = '$u->id_user'");
                if (mysqli_num_rows($tampil) > 0) {
                    while ($t = mysqli_fetch_array($tampil)) {
                ?>
                        <center>
                            <div class="cd">
                                <div class="cd2">
                                    <div class="imgBx">
                                        <img src="produk/<?php echo $t['gambar']; ?>" alt="..." height="275" width="275">
                                        <div class="hias"></div>
                                    </div>
                                    <div class="isik">
                                        <div class="card-body">
                                            <h2 class="card-title left" margin-left="10px"><b><?php echo $t['nama']; ?></h2></b>
                                            <div class="kurung">
                                                <div class="base">Pembelian </div>
                                                <div class="mid">:</div>
                                                <div class="is"><?php echo $t['jumbel']; ?> unit</div>
                                            </div>
                                            <div class="kurung">
                                                <div class="base">Total Pembayaran</div>
                                                <div class="mid">:</div>
                                                <div class="is">
                                                    <font color="#FF0000">Rp. <?php echo $t['total']; ?></font>
                                                </div>
                                            </div>
                                            <div class="kurung">
                                                <div class="base">Status </div>
                                                <div class="mid">:</div>
                                                <div class="is"><?php
                                                                if ($t['status'] == 1) {
                                                                    echo '<b>Segera Lakukan Pembayaran</b>';
                                                                } else if ($t['status'] == 2) {
                                                                    echo '<b>Menunggu Konfirmasi</b>';
                                                                } else if ($t['status'] == 3) {
                                                                    echo '<b>Dikirim</b>';
                                                                }
                                                                ?></div>
                                            </div>
                                            <div class="kurung">
                                                <div class="base">Time</div>
                                                <div class="mid">:</div>
                                                <div class="is"><?php echo $t['time']; ?></div>
                                            </div>
                                            <div class="btnd">
                                                <a href="detail-beli.php?id=<?php echo $t['id_beli'] ?>" class="blue">Detail</a>
                                                <a href="batal.php?id_produk=<?= $t['id_produk']; ?>&id_beli=<?= $t['id_beli']; ?>&id_user=<?= $t['id_user']; ?>&jumlah_beli=<?= $t['jumbel']; ?>&jumlah_produk=<?= $t['jumlah']; ?>" class="red">Batalkan Pesanan</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </center>
                    <?php }
                } else { ?>
                    <p>Tidak Ada Produk</p>
                <?php } ?>
            </div>
        </div>
    </div>
    </section>
    <!-- Footer-->
    <footer class="footer py-8">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4 text-lg-left">Copyright © Your Website 2020</div>
                <div class="col-lg-4 my-3 my-lg-0">
                    <a class="btn btn-dark btn-social mx-2" href="https://wa.me/qr/U3WDRNB5WV34H1"><i class="fab fa-whatsapp"></i></a>
                    <a class="btn btn-dark btn-social mx-2" href="https://m.facebook.com/profile.php?id=100037783147642&ref=content_filter"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-dark btn-social mx-2" href="https://www.instagram.com/amandafadilaa?r=nametag"><i class="fab fa-instagram"></i></a>
                </div>
                <div class="col-lg-4 text-lg-right">
                    <a class="mr-3" href="#!">Privacy Policy</a>
                    <a href="#!">Terms of Use</a>
                </div>
            </div>
        </div>
    </footer>
    <!-- Portfolio Modals-->
    <!-- Bootstrap core JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Third party plugin JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <!-- Contact form JS-->
    <script src="assets/mail/jqBootstrapValidation.js"></script>
    <script src="assets/mail/contact_me.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
</body>

</html>