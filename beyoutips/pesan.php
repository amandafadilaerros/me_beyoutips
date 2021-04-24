<?php
session_start();
include 'koneksi.php';
$produk = mysqli_query($koneksi, "SELECT * FROM tb_produk WHERE id_produk ='" . $_GET['id'] . "'");
$p = mysqli_fetch_object($produk);
$user = mysqli_query($koneksi, "SELECT * FROM tb_login WHERE id_user = '" . $_SESSION['id'] . "'");
$u = mysqli_fetch_object($user);
error_reporting(0);
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
                    <h2 class="section-heading text-uppercase">Beyoutips Order Form</h2>
                    <h3 class="section-subheading text-muted">Pesan Produk Kecantikan Anda</h3>
                </div>

                <div class="col">
                    <form method="post" action="cek.php" enctype="multipart/form-data">
                        <center>
                            <table class="table table-condensed ml-2 mr-2 pt-2">
                                <tr>
                                    <td><b>Produk</b></td>
                                    <td> : </td>
                                    <td>
                                        <div class="form-group">
                                            <img src="produk/<?php echo $p->gambar ?>" width="150" height="150" />
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><b>Jumlah Tersedia</b></td>
                                    <td> : </td>
                                    <td>
                                        <div class="form-group">
                                            <?php echo $p->jumlah ?> unit
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><b>Nama</b></td>
                                    <td> : </td>
                                    <td>
                                        <div class="form-group">
                                            <input class="form-control" name="nama" type="text" placeholder="Your Name *" required="required" data-validation-required-message="Please enter your name." />
                                            <p class="help-block text-danger"></p>
                                        </div>
                                    </td>
                                <tr>
                                    <td><b>Jumlah Pesanan</b></td>
                                    <td> : </td>
                                    <td>
                                        <div class="form-group">
                                            <input class="form-control" name="jumbel" type="text" placeholder="*" required="required" data-validation-required-message="Please enter your name." />
                                            <p class="help-block text-danger"></p>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><b>No Hp</b></td>
                                    <td> : </td>
                                    <td>
                                        <div class="form-group">
                                            <input class="form-control" name="no" type="text" placeholder="Phone Number *" required="required" data-validation-required-message="Please enter your name." />
                                            <p class="help-block text-danger"></p>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><b>Alamat</b></td>
                                    <td> : </td>
                                    <td>
                                        <div class="form-group">
                                            <textarea name="alamat" id="" cols="30" rows="5" class="form-control" placeholder="Address*"></textarea>
                                            <p class="help-block text-danger"></p>
                                        </div>
                                    </td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td><b>Provinsi</b></td>
                                    <td> : </td>
                                    <td>
                                        <div class="form-group">
                                            <select name="nama_provinsi" class="form-control">

                                            </select>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><b>Kota / Kabupaten</b></td>
                                    <td> : </td>
                                    <td>
                                        <div class="form-group">
                                            <select name="nama_kota" class="form-control">

                                            </select>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><b>Ekspedisi</b></td>
                                    <td> : </td>
                                    <td>
                                        <div class="form-group">
                                            <select name="nama_ekspedisi" class="form-control">

                                            </select>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><b>Opsi Pengiriman</b></td>
                                    <td> : </td>
                                    <td>
                                        <div class="form-group">
                                            <select name="opsi_pengiriman" class="form-control">

                                            </select>
                                        </div>
                                    </td>
                                </tr>
                                <td><b>Keterangan Tambahan</b></td>
                                <td> : </td>
                                <td>
                                    <div class="form-group">
                                        <textarea name="ket" id="" cols="30" rows="5" class="form-control" placeholder="Gift Some Message *"></textarea>
                                        <p class="help-block text-danger"></p>
                                    </div>
                                </td>
                                </>
                                <input type="hidden" name="idus" value="<?php echo $u->id_user ?>">
                                <input type="hidden" name="idpr" value="<?php echo $p->id_produk ?>">
                                <input type="hidden" name="hrg" value="<?php echo $p->harga ?>">
                                <input type="hidden" name="jumpro" value="<?php echo $p->jumlah ?>">
                                <input type="hidden" name="berat" value="<?php echo $p->berat ?>">
                                <tr>
                                </tr>
                </div>
                </table>
                <br>
                <input type="hidden" name="ongkir">
                <input type="submit" name="pesan" value="Pesan" class="btn btn-primary">
                </form>
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
    <script>
        $(document).ready(function() {
            $.ajax({
                type: 'post',
                url: 'dataprovinsi.php',
                success: function(hasil) {
                    $("select[name=nama_provinsi]").html(hasil);
                }
            });
            $("select[name=nama_provinsi]").on("change", function() {
                var pilih_id_provinsi = $("option:selected", this).attr("id_provinsi");
                $.ajax({
                    type: 'post',
                    url: 'datakota.php',
                    data: 'id_provinsi=' + pilih_id_provinsi,
                    success: function(hasil_k) {
                        $("select[name=nama_kota]").html(hasil_k)
                    }
                })
            })
            $.ajax({
                type: 'post',
                url: 'dataekspedisi.php',
                success: function(hasil_e) {
                    $("select[name=nama_ekspedisi]").html(hasil_e)
                }
            })
            $("select[name=nama_ekspedisi]").on("change", function() {
                var pilih_pengiriman = $("select[name=nama_ekspedisi]").val();
                var jumlah = $("input[name=jumbel]").val();
                var destinasi = $("option:selected", "select[name=nama_kota]").attr("id_kota");
                var berat = $("input[name=berat]").val();
                alert(total_berat);
                $.ajax({
                    type: 'post',
                    url: 'datapengiriman.php',
                    data: 'ekspedisi=' + pilih_pengiriman + '&kota=' + destinasi + '&berat=' + total_berat,
                    success: function(hasil_p) {
                        $("select[name=opsi_pengiriman]").html(hasil_p);
                    }
                })
            })
            $("select[name=opsi_pengiriman]").on("change", function() {
                var ongkir = $("option:selected", this).attr("ongkir");
                $("input[name=ongkir]").val(ongkir);
            })
        })
    </script>


</body>

</html>