<?php
session_start();
include 'koneksi.php';
$user = mysqli_query($koneksi, "SELECT * FROM tb_login WHERE id_user = '" . $_SESSION['id'] . "'");
$u = mysqli_fetch_object($user);
$beli = mysqli_query($koneksi, "SELECT * FROM tb_beli WHERE id_beli= '" . $_GET['id'] . "'");
$b = mysqli_fetch_object($beli);
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
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Detail Pesanan</h2>
                </div>
                <div class="alert alert-warning">
                    <center>
                        PEMBAYARAN KE NO REKENING = 0097648593765 BANK BRI a.n OLIVIA </center>
                </div>
                <div class="col">
                    <table class="table table-bordered">
                        <?php
                        include "koneksi.php";
                        $query = "SELECT * FROM tb_beli INNER JOIN tb_produk ON tb_beli.id_produk = tb_produk.id_produk WHERE tb_beli.id_beli = $b->id_beli";
                        $hasil = mysqli_query($koneksi, $query);
                        $no = 1;
                        $jum = mysqli_num_rows($hasil);
                        while ($data = mysqli_fetch_array($hasil)) {
                        ?>
                            <tr>
                                <td><b>Foto Produk</b></td>
                                <td> : </td>
                                <td><?php?><img src="produk/<?php echo $data['gambar'] ?>" width="300px" alt=""> </td>
                            </tr>
                            <tr>
                                <td><b>Nama</b></td>
                                <td> : </td>
                                <td><?php echo $data['nama']; ?></td>
                            </tr>
                            <tr>
                                <td><b>Keterangan</b></td>
                                <td> : </td>
                                <td><?php echo $data['ket']; ?></td>
                            </tr>
                            <tr>
                                <td><b>Jumlah Produk</b></td>
                                <td> : </td>
                                <td><?php echo $data['jumlah']; ?></td>
                            </tr>
                            <tr>
                                <td><b>Status</b></td>
                                <td> : </td>
                                <td>
                                    <?php
                                    if ($data['status'] == 1) {
                                        echo '<b>Segera Lakukan Pembayaran</b>';
                                    } else if ($data['status'] == 2) {
                                        echo '<b>Menunggu Konfirmasi</b>';
                                    } else if ($data['status'] == 3) {
                                        echo '<b>Dikirim</b>';
                                    }
                                    ?></td>
                            </tr>
                            <tr>
                                <td><b>Harga</b></td>
                                <td> : </td>
                                <td><?php echo $data['harga']; ?></td>
                            </tr>
                            <tr>
                                <td><b>Bukti Pembayaran</b> </td>
                                <td> : </td>
                                <td><?php
                                    if ($data['status'] == 1) {
                                    ?>
                                        <form action="" method="post" enctype="multipart/form-data">
                                            <input type="file" name="bukti" id="">
                                            <button type="submit" value="submit" name="submit">Serahkan</button>
                                        </form>
                                    <?php } else if ($data['status'] > 1) {
                                    ?>
                                        <b>Bukti Pendaftaran Di Kirim</b>
                                    <?php } ?>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </table>
                    <?php
                    if (isset($_POST['submit'])) {
                        $filename = $_FILES['bukti']['name'];
                        $tmp_name = $_FILES['bukti']['tmp_name'];

                        $type1 = explode('.', $filename);
                        $type2 = $type1[1];

                        $newname = 'bukti' . time() . '.' . $type2;

                        //menampung data format file yang diizinkan
                        $tipe_diizinkan = array('jpg', 'jpeg' . 'png', 'gif');

                        //validasi format file
                        if (!in_array($type2, $tipe_diizinkan)) {
                            //jika format file tidakdi izinkan
                            echo '<script>alert("Format Cover Tidak Di Izinkan")</script>';
                        } else {
                            //jika format file sesuai dengan yanga da di dalam array tipe 
                            //proses upload file sekaligus insert ke database
                            move_uploaded_file($tmp_name, 'bukti/' . $newname);
                            $update = mysqli_query($koneksi, "UPDATE tb_beli SET
									status = 2, 
                                    bukti = '" . $newname . "' 
									WHERE id_beli = '" . $b->id_beli . "'
								");
                            if ($update) {
                                echo '<script>alert("Bukti sudah terkirim")</script>';
                            }
                        }
                    }
                    ?>
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