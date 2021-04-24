<?php
session_start();
include '../koneksi.php';
$query = mysqli_query($koneksi, "SELECT * FROM tb_admin WHERE id_admin = '" . $_SESSION['id'] . "'");
$a = mysqli_fetch_object($query);
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
          <div class="text-white">
            <h2> Hello, <?php echo $a->username; ?> </h2>
          </div>
        </center><br>
        <li class="nav-item">
          <a class="nav-link active text-white" aria-current="page" href="admin.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
          <hr class="bg-secondary">
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="data_makeup.php"><i class="far fa-list-alt"></i> Data Produk</a>
          <hr class="bg-secondary">
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="input.php"><i class="fas fa-sign-in-alt"></i> Input Produk</a>
          <hr class="bg-secondary">
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="kategori.php"><i class="fas fa-cog"></i> Data Kategori</a>
          <hr class="bg-secondary">
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="dataorder.php"><i class="fas fa-shopping-cart"></i> Data Order</a>
          <hr class="bg-secondary">
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="laporan.php"><i class="far fa-clipboard"></i> Laporan</a>
          <hr class="bg-secondary">
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="logout.php">
            <i class="fas fa-sign-out-alt mr-2"></i>Logout</a>
          <hr class="bg-secondary">
        </li>
      </ul>
    </div>

    <div class="col-md-10 p-5">
      <h3><i class="fas fa-sign-in-alt"></i> INPUT PRODUK </h3>

      <hr>
      <form method="post" action="" enctype="multipart/form-data">
        <center>
          <table class="table table-bordered ml-2 mr-4" width="1000px">
            <tr>
              <td><b>Gambar</b></td>
              <td><input type="file" name="image" class="form-control"></td>
            </tr>
            <tr>
              <td><b>Nama Produk</b></td>
              <td><input type="text" name="nama" class="form-control"></td>
            </tr>
            <tr>
              <td><b>Berat Produk(gram)</b></td>
              <td><input type="text" name="berat" class="form-control"></td>
            </tr>
            <tr>
              <td><b>Jumlah Stok</b></td>
              <td><input type="text" name="jumlah" class="form-control"></td>
            </tr>
            <tr>
              <td><b>Kategori</b></td>
              <td><select class="form-control" name="kategori" required>
                  <option value="">--Pilih--</option>
                  <?php
                  $kategori = mysqli_query($koneksi, "SELECT * FROM tb_kategori ORDER BY id_kategori DESC");
                  while ($r = mysqli_fetch_array($kategori)) {
                  ?>
                    <option value="<?php echo $r['id_kategori'] ?>"><?php echo $r['kategori_nama'] ?></option>
                  <?php } ?>
                </select></td>
            </tr>
            <tr>
              <td><b>Keterangan</b></td>
              <td><textarea name="keterangan" cols="20" rows="5" class="form-control"></textarea></td>
            </tr>
            <tr>
              <td><b>Harga</b></td>
              <td><input type="text" name="harga" class="form-control"></td>
            </tr>
    </div>
    </table>
    <br>
    <input type="submit" name="submit" value="SUBMIT" class="btn btn-primary">
    <input type="reset" name="reset" value="RESET" class="btn btn-danger">
    </form>
    <?php
    include '../koneksi.php';
    if (isset($_POST['submit'])) {
      //print_r($_FILES['gambar']);
      //menampung inputan dari form
      $nama       = $_POST['nama'];
      $ket      = $_POST['keterangan'];
      $harga  = $_POST['harga'];
      $berat = $_POST['berat'];
      $jumlah = $_POST['jumlah'];
      $kat   = $_POST['kategori'];
      //menampung data file yang diupload
      $filename = $_FILES['image']['name'];
      $tmp_name = $_FILES['image']['tmp_name'];

      $type1 = explode('.', $filename);
      $type2 = $type1[1];

      $newname = 'produk' . time() . '.' . $type2;

      //menampung data format file yang diizinkan
      $tipe_diizinkan = array('jpg', 'jpeg', 'png', 'gif');

      //validasi format file
      if (!in_array($type2, $tipe_diizinkan)) {
        //jika format file tidakdi izinkan
        echo '<script>alert("Format Cover Tidak Di Izinkan")</script>';
      } else {
        //jika format file sesuai dengan yanga da di dalam array tipe 
        //proses upload file sekaligus insert ke database
        move_uploaded_file($tmp_name, '../produk/' . $newname);

        $insert = mysqli_query($koneksi, "INSERT INTO tb_produk VALUES(
                                '',
                                '" . $kat . "',
                                '" . $nama . "',
                                '" . $ket . "',
                                '" . $harga . "',
                                '" . $berat . "',
                                '" . $newname . "',
                                '" . $jumlah . "')
                            ");
        if ($insert) {
          echo '<script>alert("Tambah data berhasil")</script>';
          echo '<script>window.location="data_makeup.php"</script>';
        } else {
          echo 'MYSQL ERROR' . mysqli_error($koneksi);
        }
      }
    }
    ?>
</body>

</html>