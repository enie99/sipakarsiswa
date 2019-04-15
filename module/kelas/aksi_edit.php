<?php
session_start();
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])) {

	echo "<center>untuk mengakses modul, anda harus login <br>";
	echo "<a href=../../index.php><b>LOGIN</b></a></center>";
} else {
	include "../../lib/koneksi.php";
	include "../../lib/config.php";
	
	$idKelas = $_POST['idKelas'];
	$idJurusan = $_POST['jurusan'];
    $tingkatKelas = $_POST['tingkatKelas'];
    $subKelas = $_POST['subKelas'];
    $jmlSiswa = $_POST['jmlSiswa'];
    $waliKelas = $_POST['waliKelas'];
    $nip=substr($waliKelas, 0,18);
	
	
	$queryEdit = mysqli_query($connect,"UPDATE kelas SET tingkat_kelas ='$tingkatKelas', id_jurusan='$idJurusan', sub_kelas='$subKelas', nip='$nip', jml_siswa='$jmlSiswa' WHERE id_kelas='$idKelas'" );

	if ($queryEdit) {
		echo "<script> alert ('Data Kelas Berhasil Diubah'); window.location = '$base_url'+'main.php?module=kelas';</script>";
	}
	else {
		echo "<script> alert('Data Kelas Gagal Diubah'); window.location='$base_url'+'main.php?module=edit_kelas&id_kelas='+'$idKelas';</script>";
	}
}
?>