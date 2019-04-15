<?php
session_start();
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])) {

	echo "<center>untuk mengakses modul, anda harus login <br>";
	echo "<a href=../../index.php><b>LOGIN</b></a></center>";
} else {
	include "../../lib/koneksi.php";
	include "../../lib/config.php";
	
	$idJurusan = $_POST['idJurusan'];
	$namaJurusan = $_POST['namaJurusan'];
	
	$queryEdit = mysqli_query($connect,"UPDATE jurusan SET nama_jurusan ='$namaJurusan' WHERE id_jurusan='$idJurusan'" );

	if ($queryEdit) {
		echo "<script> alert ('Data Jurusan Berhasil Diubah'); window.location = '$base_url'+'main.php?module=jurusan';</script>";
	}
	else {
		echo "<script> alert('Data Jurusan Gagal Diubah'); window.location='main.php?module=edit_jurusan&id_jurusan='+'$idJurusan';</script>";
	}
}
?>