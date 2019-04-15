<?php
session_start();
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])) {

	echo "<center>untuk mengakses modul, anda harus login <br>";
	echo "<a href=index.php><b>LOGIN</b></a></center>";
} else {
	include "../../lib/koneksi.php";
	include "../../lib/config.php";

	$nis=$_GET['nis'];
	$queryHapus=mysqli_query($connect,"DELETE FROM siswa WHERE nis='$nis'");
	if ($queryHapus) {
		echo "<script> alert('Data Siswa Berhasil di Hapus'); window.location='$base_url'+'main.php?module=siswa';</script>";
	}
	else {
		echo "<script> alert('Data Siswa Gagal di Hapus'); window.location='$base_url'+'main.php?module=siswa';</script> ";
	}

	}
?>