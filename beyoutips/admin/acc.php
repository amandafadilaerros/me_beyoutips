<?php
session_start();
include 'koneksi.php';

$acc = $_GET['acc'];

if ($acc) {
    mysqli_query($koneksi, "UPDATE tb_beli SET status = 3 WHERE id_beli = '$acc'");
    echo '<script>alert("Berhasil Konfirmasi")</script>';
    echo '<script>window.location="laporan.php"</script>';
} else {
    echo 'gagal' . mysqli_error($koneksi);
}
