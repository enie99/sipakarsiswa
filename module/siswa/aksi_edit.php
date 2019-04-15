<?php
session_start();
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])) {

	echo "<center>untuk mengakses modul, anda harus login <br>";
	echo "<a href=../../index.php><b>LOGIN</b></a></center>";
} else {
	include "../../lib/koneksi.php";
	include "../../lib/config.php";
	
	$nis = $_POST['nis'];
    $namaSiswa = $_POST['namaSiswa'];
    $idKelas = $_POST['kelas'];
    $thAngkatan = $_POST['thAngkatan'];
    $alamat = $_POST['alamat'];
    $ortu = $_POST['ortu'];
    if (substr($ortu, 2,1)=="-"){
        $idOrtu=substr($ortu, 0,1);    
    }elseif (substr($ortu, 3,1)=="-") {
        $idOrtu=substr($ortu, 0,2);
    }elseif (substr($ortu, 4,1)=="-") {
        $idOrtu=substr($ortu, 0,3);
    }elseif (substr($ortu, 5,1)=="-") {
        $idOrtu=substr($ortu, 0,4);
    }elseif (substr($ortu, 6,1)=="-") {
        $idOrtu=substr($ortu, 0,5);
    }else{
        $idOrtu=substr($ortu, 0,6);
    }
    
	
	$queryEdit = mysqli_query($connect,"UPDATE siswa SET nama_siswa ='$namaSiswa', id_kelas='$idKelas', alamat='$alamat', th_angkatan='$thAngkatan', id_ortu='$idOrtu' WHERE nis='$nis'" );

	if ($queryEdit) {
		echo "<script> alert ('Data Siswa Berhasil Diubah'); window.location = '$base_url'+'main.php?module=siswa';</script>";
	}
	else {
		echo "<script> alert('Data Siswa Gagal Diubah'); window.location='$base_url'+'main.php?module=edit_siswa&nis='+'$nis';</script>";
	}
}
?>