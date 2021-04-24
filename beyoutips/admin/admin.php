<?php
session_start();
include '../koneksi.php';
	$query = mysqli_query($koneksi,"SELECT * FROM tb_admin WHERE id_admin = '".$_SESSION['id']."'");
    $a = mysqli_fetch_object($query);
?>
<!doctype html>
<html lang="en">
  <head>
    <link rel="stylesheet" type="text/css" href="../fontawesome-free/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="css/cssadmin.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
	  <title> admin beyoutips </title>
  </head>

<body>
  <div id="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-warning fixed-top">
    <a class="navbar-brand font-weight-bold text-white"> SELAMAT DATANG ADMIN | BEYOUTIPS</a>
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
          <a class="nav-link text-white" href="kategori.php"><i class="fas fa-cog"></i> Data Kategori</a><hr class="bg-secondary">
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
    <h3><i class="fas fa-tachometer-alt"></i> DASHBOARD</h3><hr>


    <div class="row text-white">
      <div class="card bg-info ml-3" style="width: 18rem;">
        <div class="card-body">
          <div class="card-body-icon"><i class="far fa-list-alt"></i></div>
          
          <h4 class="card-title">DATA PRODUK</h4><br>
          <a href="data_makeup.php" class="text-white">Lihat Detail<i class="fas fa-angle-double-right ml-2"></i></a>
        </div>
      </div>


      <div class="card bg-success ml-3" style="width: 18rem;">
        <div class="card-body">
          <div class="card-body-icon"><i class="fas fa-sign-in-alt"></i></div>
          
          <h4 class="card-title">INPUT PRODUK</h4><br>
          <a href="input.php" class="text-white">Lihat Detail<i class="fas fa-angle-double-right ml-2"></i></a>
        </div>
      </div>
    

      <div class="card bg-danger ml-3" style="width: 18rem;">
        <div class="card-body">
          <div class="card-body-icon"><i class="fas fa-shopping-cart"></i></div>
          
          <h4 class="card-title">DATA ORDER</h4><br>
          <a href="dataorder.php" class="text-white">Lihat Detail<i class="fas fa-angle-double-right ml-2"></i></a>
        </div>
      </div>

</div>
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
  </body>
</html>