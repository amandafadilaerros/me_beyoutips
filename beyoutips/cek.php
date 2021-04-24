<?php
session_start();
error_reporting(0);
include 'koneksi.php';
//$produk= mysqli_query($koneksi,"SELECT * FROM tb_produk WHERE id_produk ='".$_GET['id']."'");
//$p = mysqli_fetch_object($produk);
//$query = mysqli_query($koneksi,"SELECT * FROM tb_login WHERE id_user = '".$_SESSION['id']."'");
//$u = mysqli_fetch_object($query);
$totall = ($_POST['jumbel'] * $_POST['hrg']) + $_POST['ongkir'];
$berat = $_POST['jumbel'] * $_POST['berat'];
$total_harga_barang = $_POST['jumbel'] * $_POST['hrg'];
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
                    <h2 class="section-heading text-uppercase">Beyoutips Order</h2>
                    <h3 class="section-subheading text-muted">Periksa Data Pesanan Anda</h3>
                </div>
                <div class="alert alert-warning">
                    <center>
                        Periksa Benar - Benar barang pesanan anda dan juga data pemesanan anda. Kami tidak bertanggung
                        jawab jika terjadi kesalahan yang di sebabkan oleh pelanggan sendiri. Pastikan data anda valid
                        agar kami dapat mengirim barang anda ke tempat tujuan dengan aman</center>
                </div>
                <div class="col">
                    <form method="post" action="" enctype="multipart/form-data">
                        <center>
                            <table class="table table-condensed ml-2 mr-2 pt-2">
                                <tr>
                                    <td><b>Nama</b></td>
                                    <td> : </td>
                                    <td>
                                        <div class="form-group">
                                            <input type="text" name="nama" class="form-control" value="<?php echo $_POST['nama'] ?>" disabled>
                                            <input type="hidden" name="namaaa" value="<?php echo $_POST['nama'] ?>">
                                            <p class="help-block text-danger"></p>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><b>Jumlah Pesanan</b></td>
                                    <td> : </td>
                                    <td>
                                        <div class="form-group">
                                            <input type="text" name="jumlah" class="form-control" value="<?php echo $_POST['jumbel'] ?>" disabled>
                                            <input type="hidden" name="jmlh" value="<?php echo $_POST['jumbel'] ?>">
                                        </div>
                                </tr>
                                <tr>
                                    <td><b>Berat Produk</b></td>
                                    <td> : </td>
                                    <td>
                                        <div class="form-group">
                                            <input type="text" name="total_berat" class="form-control" value="<?php echo $_POST['berat']   ?>" disabled>
                                            <input type="hidden" name="total_berat" value="<?php $_POST['berat'] ?>">
                                        </div>
                                </tr>
                                <tr>
                                    <td><b>Total Berat</b></td>
                                    <td> : </td>
                                    <td>
                                        <div class="form-group">
                                            <input type="text" name="total_berat" class="form-control" value="<?php echo $berat   ?>" disabled>
                                            <input type="hidden" name="total_berat" value="<?php $berat ?>">
                                        </div>
                                </tr>
                                <tr>
                                    <td><b>No Hp</b></td>
                                    <td> : </td>
                                    <td>
                                        <div class="form-group">
                                            <input type="text" name="no" class="form-control" value="<?php echo $_POST['no'] ?>" disabled>
                                            <input type="hidden" name="hp" value="<?php echo $_POST['no'] ?>">
                                            <p class="help-block text-danger"></p>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><b>Alamat</b></td>
                                    <td> : </td>
                                    <td>
                                        <div class="form-group">
                                            <textarea name="alamat" id="" cols="30" rows="5" class="form-control" disabled><?php echo $_POST['alamat'] ?></textarea>
                                            <input type="hidden" name="almt" value="<?php echo $_POST['alamat'] ?>">
                                            <p class="help-block text-danger"></p>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><b>Keterangan Tambahan</b></td>
                                    <td> : </td>
                                    <td>
                                        <div class="form-group">
                                            <textarea name="ket" id="" cols="30" rows="5" class="form-control" disabled><?php echo $_POST['ket']; ?></textarea>
                                            <input type="hidden" name="ketrangan" value="<?php echo $_POST['ket'] ?>">
                                            <p class="help-block text-danger"></p>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><b>Harga Barang</b></td>
                                    <td> : </td>
                                    <td>
                                        <div class="form-group">
                                            <input type="text" name="" class="form-control" value="<?php echo $_POST['hrg'] ?>" disabled>
                                            <input type="hidden" name="" value="<?php echo $_POST['hrg']; ?>">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><b>Total Harga Barang</b></td>
                                    <td> : </td>
                                    <td>
                                        <div class="form-group">
                                            <input type="text" name="" class="form-control" value="<?php echo $total_harga_barang ?>" disabled>
                                            <input type="hidden" name="" value="<?php echo $total_harga_barang; ?>">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><b>Harga Ongkir</b></td>
                                    <td> : </td>
                                    <td>
                                        <div class="form-group">
                                            <input type="text" name="" class="form-control" value="<?php echo $_POST['ongkir'] ?>" disabled>
                                            <input type="hidden" name="" value="<?php echo $_POST['ongkir']; ?>">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><b>Total Pembayaran</b></td>
                                    <td> : </td>
                                    <td>
                                        <div class="form-group">
                                            <input type="text" name="total" class="form-control" value="<?php echo $totall ?>" disabled>
                                            <input type="hidden" name="hasil" value="<?php echo $totall; ?>">
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                </tr>
                </div>

                <input type="hidden" name="idus" value="<?php echo $_POST['idus']; ?>">
                <input type="hidden" name="idpr" value="<?php echo $_POST['idpr']; ?>">
                <input type="hidden" name="jp" value="<?php echo $_POST['jumpro']; ?>">
                </table>
                <br>
                <input type="submit" name="pesannn" value="Pesan" class="btn btn-primary">
                </form>
                <?php
                include 'koneksi.php';
                if (isset($_POST['pesannn'])) {
                    $hasil = $_POST['hasil'];
                    $nama = $_POST['namaaa'];
                    $jumbel = $_POST['jmlh'];
                    $no = $_POST['hp'];
                    $alamat = $_POST['almt'];
                    $keterangan = $_POST['keterangan'];
                    $idus = $_POST['idus'];
                    $idpr = $_POST['idpr'];
                    $insert = mysqli_query($koneksi, "INSERT INTO tb_beli VALUES(
                    '',
                    '" . $nama . "',
                    '" . $alamat . "',
                    '" . $no . "',
                    '',
                    1,
                    '" . $jumbel . "',
                    '" . $keterangan . "',
                    '" . $hasil . "',
                    NULL,
                    '" . $idpr . "',
                    '" . $idus . "')
                ");
                    if ($insert) {

                        $jumpro = $_POST['jp'];
                        $ja = $jumpro - $jumbel;
                        $update = mysqli_query($koneksi, "UPDATE tb_produk SET
									jumlah = '" . $ja . "' 
									WHERE id_produk = '" . $idpr . "'
								");
                        if ($update) {
                            echo '<script>alert("Pesanan Berhasil di daftarkan")</script>';
                            echo '<script>window.location="pembelian.php"</script>';
                        } else {
                            echo 'gagal' . mysqli_error($koneksi);
                        }
                        echo '<script>alert("Pesanan Didaftarkan")</script>';
                        echo '<script>window.location="pembelian.php"</script>';
                    } else {
                        echo 'MYSQL ERROR' . mysqli_error($koneksi);
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