<?php
session_start();
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])) {

	echo "<center>untuk mengakses modul, anda harus login <br>";
	echo "<a href=../../index.php><b>LOGIN</b></a></center>";
} else {
	include "../../lib/koneksi.php";
	include "../../lib/config.php";

	$nip=$_GET['nip'];
	$queryHapus=mysqli_query($connect,"DELETE FROM guru WHERE nip='$nip'");
	if ($queryHapus) {
		echo "<script> alert('Data Guru Berhasil di Hapus'); window.location='$base_url'+'main.php?module=guru';</script>";
	}
	else {
		echo "<script> alert('Data Guru Gagal di Hapus'); window.location='$base_url'+'main.php?module=guru';</script> ";
	}

	}
?>