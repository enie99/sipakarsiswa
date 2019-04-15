<?php
session_start();
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])) {

	echo "<center>untuk mengakses modul, anda harus login <br>";
	echo "<a href=../../index.php><b>LOGIN</b></a></center>";
} else {
	include "../../lib/koneksi.php";
	include "../../lib/config.php";

	$idKelas=$_GET['id_kelas'];
	$queryHapus=mysqli_query($connect,"DELETE FROM kelas WHERE id_kelas='$idKelas'");
	if ($queryHapus) {
		echo "<script> alert('Data Kelas Berhasil di Hapus'); window.location='$base_url'+'main.php?module=kelas';</script>";
	}
	else {
		echo "<script> alert('Data Kelas Gagal di Hapus'); window.location='$base_url'+'main.php?module=kelas';</script> ";
	}

	}
?>