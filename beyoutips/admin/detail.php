<?php
session_start();
include '../koneksi.php';
	$query = mysqli_query($koneksi,"SELECT * FROM tb_admin WHERE id_admin = '".$_SESSION['id']."'");
    $a = mysqli_fetch_object($query);
    $produk = mysqli_query($koneksi,"SELECT * FROM tb_produk WHERE id_produk = '".$_GET['idp']."'");
    $p = mysqli_fetch_object($produk);
?>
<!doctype html>
<html lang="en">
  <head>
    <link rel="stylesheet" type="text/css" href="../fontawesome-free/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="../css/cssadmin.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
      <title> admin beyoutips </title>
  </head>

<body>
  <div id="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-warning fixed-top">
    <a class="navbar-brand font-weight-bold text-white" href="#" text>SELAMAT DATANG ADMIN | BEYOUTIPS</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>

  
  </div>
</nav>
</div>

<div class="row no-gutters mt-5">
  <div class="col-md-2 bg-dark mt-2 pr-2 pt-4">
      <ul class="nav flex-column ml-3 mb-5">
        <center>
        <div class="text-white"><h2> Hello, <?php echo $a->username; ?> </h2></div> </center><br>
        <li class="nav-item">
          <a class="nav-link active text-white" aria-current="page" href="admin.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a><hr class="bg-secondary">
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="data_makeup.php"><i class="far fa-list-alt"></i> Data Produk</a><hr class="bg-secondary">
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="input.php"><i class="fas fa-sign-in-alt"></i> Input Produk</a><hr class="bg-secondary">
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="dataorder.php"><i class="fas fa-shopping-cart"></i> Data Order</a><hr class="bg-secondary">
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="laporan.php"><i class="far fa-clipboard"></i> Laporan</a><hr class="bg-secondary">
        </li>
        <li class="nav-item">
        <a class="nav-link text-white" href="logout.php">
        <i class="fas fa-sign-out-alt mr-2"></i>Logout</a><hr class="bg-secondary">
      </li>
      </ul>
  </div>
  <div class="col-md-10 p-5">
    <h3><i class="fas fa-info-circle"></i> DETAIL PRODUK</h3><hr>




	<table class="table table-bordered">
  <?php
    include "../koneksi.php";
    $query="SELECT * FROM tb_produk INNER JOIN tb_kategori ON tb_produk.id_kategori = tb_kategori.id_kategori WHERE tb_produk.id_produk = $p->id_produk";
    $hasil=mysqli_query($koneksi,$query);
    $no=1;
    $jum=mysqli_num_rows($hasil);
    echo "Jumlah Produk : <b>".$jum."</b><br>";
    while ($data=mysqli_fetch_array($hasil)){
?>
		<tr><td><b>Foto Produk</b></td><td> : </td><td><?php echo "<img src='../produk/$data[gambar]' width='150' height='150' />";?> </td></tr>
		<tr><td><b>Nama</b></td><td> : </td><td><?php echo $data['nama'];?></td></tr>
		<tr><td><b>Keterangan</b></td><td> : </td><td><?php echo $data['ket'];?></td></tr>
		<tr><td><b>Jumlah Produk</b></td><td> : </td><td><?php echo $data['jumlah'];?></td></tr>
    <tr><td><b>Kategori</b></td><td> : </td><td><?php echo $data['kategori_nama'];?></td></tr>
		<tr><td><b>Harga</b></td><td> : </td><td><?php echo $data['harga'];?></td></tr>
    <?php
        }
    ?>
	</table>
