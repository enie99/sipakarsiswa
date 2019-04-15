<?php
session_start();
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])) {

	echo "<center>untuk mengakses modul, anda harus login <br>";
	echo "<a href=../../index.php><b>LOGIN</b></a></center>";
} else {
	include "../../lib/koneksi.php";
	include "../../lib/config.php";
	
	$idTindakan = $_POST['idTindakan'];
	$namaTindakan = $_POST['namaTindakan'];
    $ketentuan = $_POST['ketentuan'];
	
	$queryEdit = mysqli_query($connect,"UPDATE tindakan SET nama_tindakan ='$namaTindakan', ketentuan ='$ketentuan' WHERE id_tindakan='$idTindakan'" );

	if ($queryEdit) {
		echo "<script> alert ('Data Tindakan Berhasil Diubah'); window.location = '$base_url'+'main.php?module=tindakan';</script>";
	}
	else {
		echo "<script> alert('Data Tindakan Gagal Diubah'); window.location='$base_url'+'main.php?module=edit_tindakan&id_tindakan='+'$idTindakan';</script>";
	}
}
?>