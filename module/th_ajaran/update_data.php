<?php
session_start();
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])) {

	echo "<center>untuk mengakses modul, anda harus login <br>";
	echo "<a href=../../index.php><b>LOGIN</b></a></center>";
} else {
	include "../../lib/koneksi.php";
	include "../../lib/config.php";
    
    $idThAjaran = $_POST['idThAjaran'];	
	$thAjaran = $_POST['thAjaran'];

	$queryCari = mysqli_query($connect, "SELECT * FROM th_ajaran WHERE tahun_ajaran='$thAjaran'");
	$hasilCari = mysqli_num_rows($queryCari);
	$tABaru = mysqli_fetch_array($queryCari);
	$baru = $tABaru['id_th_ajaran'];
	$gantiTahun = mysqli_query($connect, "UPDATE th_ajaran SET sekarang='N' WHERE id_th_ajaran='$idThAjaran'");

	if ($hasilCari>0) {
		$queryEdit = mysqli_query($connect,"UPDATE th_ajaran SET sekarang ='Y' WHERE id_th_ajaran='$baru'" );
		if ($queryEdit) {
			echo "<script> alert ('Tahun Ajaran Berhasil Diubah'); window.location = '$base_url'+'main.php?module=home_admin';</script>";
		}
		else {
			//echo "<script> alert('Tahun Ajaran Gagal Diubah1'); window.location='$base_url'+'main.php?module=home_admin&id_th_ajaran='+'$idThAjaran';</script>";
		}
	}
	else{
		$queryTambah = mysqli_query($connect, "INSERT INTO th_ajaran (tahun_ajaran, sekarang) VALUES ('$thAjaran','Y')");
		if ($queryTambah) {
			echo "<script> alert ('Tahun Ajaran Berhasil Diubah'); window.location = '$base_url'+'main.php?module=home_admin';</script>";
		}
		else {
			//echo "<script> alert('Tahun Ajaran Gagal Diubah2'); window.location='$base_url'+'main.php?module=home_admin&id_th_ajaran='+'$idThAjaran';</script>";
		}
	}
	

	
}
?>