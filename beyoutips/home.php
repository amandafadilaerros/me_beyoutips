<?php
error_reporting(0);
session_start();
include 'koneksi.php';
	$query = mysqli_query($koneksi,"SELECT * FROM tb_login WHERE id_user = '".$_SESSION['id']."'");
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
                                    $kategori = mysqli_query($koneksi, "SELECT * FROM tb_kategori");
                                    if (mysqli_num_rows($kategori)>0) {
                                        while ($kt = mysqli_fetch_array($kategori)) {
                                ?>
                                <a class="dropdown-item" href="kategori.php?id=<?php echo $kt['id_kategori']?>"><?php echo $kt['kategori_nama'] ?></a>
                                <?php }} else{?>
                                    <p>Tidak Ada Kategori</p>
                                <?php }?>
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
    <div class="banner">
        <div class="text" data-0-top="opacity:0; left:-250px;" data-200-top="opacity:1; left:0px;">
            <h1><img src="img/but.png" alt=""></h1>
            <p>
                Lorem ipsum dolor sit, amet consectetur adipisicing elit. At tempore mollitia, cum, doloremque quibusdam ex, 
                maxime dolorum 
                inventore quasi pariatur facere aliquam illo est sint dicta doloribus. Cumque, fugiat unde.
            </p>
        </div>
        <div class="imgSlider">
            <div class="figur">
            </div>
        </div>
        <span class="skewed"></span>
        <span class="skewedr"></span>
    </div>
    <div class="content">
        <div class="subCon page-section"  id="portfolio">
        <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Beyoutips Produk</h2>
                    <h3 class="section-subheading text-muted">Temukan Jalan Kecantikan Anda</h3>
                </div>
                
                <div class="row">
                    <?php
                    include 'koneksi.php';
                    $tampil = mysqli_query($koneksi, "SELECT * FROM tb_produk INNER JOIN tb_kategori ON tb_produk.id_kategori = tb_kategori.id_kategori ORDER BY id_produk DESC LIMIT 6");
                        if (mysqli_num_rows($tampil)>0) {
                            while ($t = mysqli_fetch_array($tampil)) {
                    ?>	
                    <div class="col-lg-4 col-sm-6 mb-4">
                        <div class="portfolio-item">
                            <a class="portfolio-link" data-toggle="modal" href="#portfolioModal<?php echo $t['id_produk']?>">
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                </div>
                                <img class="img-fluid" src="produk/<?php echo $t['gambar']?>" alt="" />
                            </a>
                            <div class="portfolio-caption">
                                <div class="portfolio-caption-heading"><?php echo $t['nama'];?></div>
                                <div class="portfolio-caption-subheading text-muted"><?php echo $t['harga'];?></div>
                            </div>
                        </div>
                    </div>
                    
                    <?php }} else{?>
                        <p>Tidak Ada Produk</p>
                    <?php }?>
                </div>
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
        <!-- Modal 1-->
        <?php
            include 'koneksi.php';
            $tampil = mysqli_query($koneksi, "SELECT * FROM tb_produk INNER JOIN tb_kategori ON tb_produk.id_kategori = tb_kategori.id_kategori ORDER BY id_produk DESC LIMIT 6");
            if (mysqli_num_rows($tampil)>0) {
                while ($t = mysqli_fetch_array($tampil)) {
        ?>
        <div class="portfolio-modal modal fade" id="portfolioModal<?php echo $t['id_produk']?>" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-dismiss="modal"><img src="img/close-icon.svg" alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="modal-body">
                                    <!-- Project Details Go Here-->
                                    <h2 class="text-uppercase"><?php echo $t['nama']?></h2>
                                    <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                                    <img class="img-fluid d-block" src="produk/<?php echo $t['gambar']?>" alt="" />
                                    <p><?php echo $t['ket']?></p>
                                    <ul class="list-inline">
                                        <li>Jumlah Stok: <b><?php echo $t['jumlah']?></b></li>
                                        <li>Harga: <b><?php echo $t['harga']?></b></li>
                                        <li>Category: <b><?php echo $t['kategori_nama']?></b></li>
                                    </ul>
                                    <a href="pesan.php?id=<?php echo $t['id_produk']?>" class="btn btn-primary">Pesan Produk</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php }} else{?>
                        <p>Tidak Ada Produk</p>
                    <?php }?>
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
