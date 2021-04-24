<?php
include '../koneksi.php';
if (isset($_GET['idp'])) {
	$delete = mysqli_query($koneksi, "DELETE FROM tb_produk WHERE id_produk = '".$_GET['idp']."'");
	echo '<script>window.location="data_makeup.php"</script>';
}
if (isset($_GET['idk'])) {
	$delete = mysqli_query($koneksi, "DELETE FROM tb_kategori WHERE id_kategori = '".$_GET['idk']."'");
	echo '<script>window.location="kategori.php"</script>';
}
?>