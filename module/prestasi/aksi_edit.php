<?php
session_start();
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])) {

	echo "<center>untuk mengakses modul, anda harus login <br>";
	echo "<a href=../../index.php><b>LOGIN</b></a></center>";
} else {
	include "../../lib/koneksi.php";
	include "../../lib/config.php";
	
	$idPrestasi = $_POST['idPrestasi'];
	$namaPrestasi = $_POST['namaPrestasi'];
	$poin = $_POST['poin'];
	
	$queryEdit = mysqli_query($connect,"UPDATE prestasi SET nama_prestasi ='$namaPrestasi', poin ='$poin' WHERE id_prestasi='$idPrestasi'" );

	if ($queryEdit) {
		echo "<script> alert ('Data Prestasi Berhasil Diubah'); window.location = '$base_url'+'main.php?module=prestasi';</script>";
	}
	else {
		echo "<script> alert('Data Prestasi Gagal Diubah'); window.location='main.php?module=edit_prestasi&id_prestasi='+'$idPrestasi';</script>";
	}
}
?>