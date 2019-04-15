<?php
session_start();
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])) {

	echo "<center>untuk mengakses modul, anda harus login <br>";
	echo "<a href=../../index.php><b>LOGIN</b></a></center>";
} else {
	include "../../lib/koneksi.php";
	include "../../lib/config.php";

	$idLogin=$_GET['id_login'];
	$queryHapus=mysqli_query($connect,"DELETE FROM user WHERE id_login='$idLogin'");
	if ($queryHapus) {
		echo "<script> alert('Data User Berhasil di Hapus'); window.location='$base_url'+'main.php?module=user';</script>";
	}
	else {
		echo "<script> alert('Data User Gagal di Hapus'); window.location='$base_url'+'main.php?module=user';</script> ";
	}

	}
?>