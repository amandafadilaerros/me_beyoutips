<?php
session_start();
include 'koneksi.php';

error_reporting(0);
$id_produk = $_GET['id_produk'];
$id_beli = $_GET['id_beli'];
$id_user = $_GET['id_user'];
$jumlah_beli = $_GET['jumlah_beli'];
$jumlah_produk = $_GET['jumlah_produk'];

mysqli_query($koneksi, "DELETE FROM tb_beli WHERE id_beli = '$id_beli'");
$update = mysqli_query($koneksi, "UPDATE tb_produk SET jumlah = '$jumlah_beli' + '$jumlah_produk' WHERE id_produk = '$id_produk' ");
if ($update) {

	echo '<script>alert("Pesanan Berhasil di batalkan")</script>';
	echo '<script>window.location="pembelian.php"</script>';
} else {
	echo 'gagal' . mysqli_error($koneksi);
}
