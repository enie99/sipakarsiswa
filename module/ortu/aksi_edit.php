<?php
session_start();
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])) {

	echo "<center>untuk mengakses modul, anda harus login <br>";
	echo "<a href=../../index.php><b>LOGIN</b></a></center>";
} else {
	include "../../lib/koneksi.php";
	include "../../lib/config.php";
	
	$idOrtu = $_POST['idOrtu'];
	$namaOrtu = $_POST['namaOrtu'];
	$noHp = $_POST['noHp'];
    $alamat = $_POST['alamat'];
	
	$queryEdit = mysqli_query($connect,"UPDATE orang_tua SET nama_ortu ='$namaOrtu', no_hp='$noHp', alamat_ortu='$alamat' WHERE id_ortu='$idOrtu'" );

	if ($queryEdit) {
		echo "<script> alert ('Data Orang Tua Berhasil Diubah'); window.location = '$base_url'+'main.php?module=ortu';</script>";
	}
	else {
		echo "<script> alert('Data Orang Tua Gagal Diubah'); window.location='$base_url'+'main.php?module=edit_ortu&id_ortu='+'$idOrtu';</script>";
	}
}
?>