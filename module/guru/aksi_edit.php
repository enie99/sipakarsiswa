<?php
session_start();
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])) {

	echo "<center>untuk mengakses modul, anda harus login <br>";
	echo "<a href=../../index.php><b>LOGIN</b></a></center>";
} else {
	include "../../lib/koneksi.php";
	include "../../lib/config.php";
	
	$nip = $_POST['nip'];
	$namaGuru = $_POST['namaGuru'];
    $noHp = $_POST['noHp'];
    $jabatan = $_POST['jabatan'];
    	
	
	$queryEdit = mysqli_query($connect,"UPDATE guru SET nama_guru='$namaGuru', no_hp='$noHp', jabatan='$jabatan' WHERE nip='$nip'" );

	if ($queryEdit) {
		echo "<script> alert ('Data Guru Berhasil Diubah'); window.location = '$base_url'+'main.php?module=guru';</script>";
	}
	else {
		echo "<script> alert('Data Guru Gagal Diubah'); window.location='$base_url'+'main.php?module=edit_guru&nip='+'$nip';</script>";
	}
}
?>