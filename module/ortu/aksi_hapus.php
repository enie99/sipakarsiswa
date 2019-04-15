<?php
session_start();
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])) {

	echo "<center>untuk mengakses modul, anda harus login <br>";
	echo "<a href=../../index.php><b>LOGIN</b></a></center>";
} else {
	include "../../lib/koneksi.php";
	include "../../lib/config.php";

	$idOrtu=$_GET['id_ortu'];
	$queryHapus=mysqli_query($connect,"DELETE FROM orang_tua WHERE id_ortu='$idOrtu'");
	if ($queryHapus) {
		echo "<script> alert('Data Orang Tua Berhasil di Hapus'); window.location='$base_url'+'main.php?module=ortu';</script>";
	}
	else {
		echo "<script> alert('Data Orang Tua Gagal di Hapus'); window.location='$base_url'+'main.php?module=ortu';</script> ";
	}

	}
?>