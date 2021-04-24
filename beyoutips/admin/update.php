<?php
session_start();
include "../koneksi.php";
$id = $_GET['idp'];
$query = "SELECT * FROM tb_produk WHERE id_produk='$id'";
$hasil = mysqli_query($koneksi, $query);
$data = mysqli_fetch_array($hasil);
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
      <h3><i class="far fa-edit"></i> UPDATE DATA PRODUK</h3>
      <hr>
      <form method="post" action="">
        <center>
          <table class="table table-condensed ml-2 mr-4" width="1000px">
            <tr>
              <td><b>Gambar</b></td>
              <td>
                <?php echo "<img src='../produk/$data[gambar]' width='150' height='150' />"; ?>
                <input type="hidden" name="image" value="<?php echo $data['gambar'] ?>">
                <input type="file" name="image-baru" class="form-control">
              </td>
            </tr>
            <tr>
              <td><b>Nama Produk</b></td>
              <td><input type="text" name="nama" class="form-control" value="<?php echo $data['nama']; ?>"></td>
            </tr>
            <tr>
              <td><b>Kategori</b></td>
              <td><select class="form-control" name="kat" required>
                  <option value="">--Pilih--</option>
                  <?php
                  $kategori = mysqli_query($koneksi, "SELECT * FROM tb_kategori ORDER BY id_kategori DESC");
                  while ($r = mysqli_fetch_array($kategori)) {
                  ?>
                    <option value="<?php echo $r['id_kategori'] ?>" <?php echo ($r['id_kategori']
                                                                      == $data['id_kategori']) ? 'selected' : ''; ?>><?php echo $r['kategori_nama'] ?></option>
                  <?php } ?>
                </select></td>
            </tr>
            <tr>
              <td><b>Keterangan</b></td>
              <td>
                <textarea name="keterangan" id="" cols="30" class="form-control" rows="5"><?php echo $data['ket']; ?></textarea>
              </td>
            </tr>
            <tr>
              <td><b>Harga</b></td>
              <td><input type="text" name="harga" class="form-control" value="<?php echo $data['harga']; ?>"></td>
            </tr>
            <input type="hidden" name="id_produk" value="<?= $data['id_produk']; ?>">
    </div>
    </table>
    <input type="submit" name="update" value="update" class="btn btn-primary">
    <input type="reset" name="reset" value="reset" class="btn btn-danger">
    </form>
    <?php
    include '../koneksi.php';
    if (isset($_POST['update'])) {
      //print_r($_FILES['gambar']);
      //menampung inputan dari form
      $id = $_POST['id_produk'];
      $nama       = $_POST['nama'];
      $ket      = $_POST['keterangan'];
      $harga  = $_POST['harga'];
      $image      = $_POST['image'];
      $kat   = $_POST['kat'];
      //data gambar yang baru
      $filename = $_FILES['image-baru']['name'];
      $tmp_name = $_FILES['image-baru']['tmp_name'];


      //jika admin ganti gambar
      if ($filename != '') {
        $type1 = explode('.', $filename);
        $type2 = $type1[1];

        $newname = 'produk' . time() . '.' . $type2;
        $tipe_diizinkan = array('jpg', 'jpeg', 'png', 'gif');
        //vaidasi format file
        if (!in_array($type2, $tipe_diizinkan)) {
          //jika format file tidak di izinkan
          echo '<script>alert("Format File Tidak Di Izinkan")</script>';
        } else {
          unlink('produk/' . $image);
          move_uploaded_file($tmp_name, 'produk/' . $newname);
          $namagambar = $newname;
        }
      }
      //jika admin tidk ganti gambar
      else {
        $namagambar = $image;
      }
      //update data produk
      $update = mysqli_query($koneksi, "UPDATE tb_produk SET 
                  id_kategori = '" . $kat . "',
                  nama ='" . $nama . "',
                  ket = '" . $ket . "',
                  harga = '" . $harga . "',
                  gambar = '" . $namagambar . "'
		              WHERE id_produk=$id ");
      if ($update) {
        echo '<script>alert("Ubah data berhasil")</script>';
        echo '<script>window.location="data_makeup.php"</script>';
      } else {
        echo 'MYSQL ERROR' . mysqli_error($koneksi);
      }
    }
    ?>
</body>

</html>