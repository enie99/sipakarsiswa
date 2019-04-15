<?php
session_start();
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])) {

	echo "<center>untuk mengakses modul, anda harus login <br>";
	echo "<a href=../../index.php><b>LOGIN</b></a></center>";
} else {
	include "../../lib/koneksi.php";
	include "../../lib/config.php";
	
	$idLogin = $_POST['idLogin'];
	$username = $_POST['username'];
    $password = $_POST['password'];
    $pass = md5($password);
    $nis = $_POST['nis'];

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

    $guru = $_POST['guru'];
    $nip=substr($guru, 0,18);
    $hakAkses = $_POST['hakAkses'];

	$queryEdit = mysqli_query($connect,"UPDATE user SET username='$username', password='$pass', nis='$nis', nip='$nip', id_ortu='$idOrtu', hak_akses='$hakAkses' WHERE id_login='$idLogin'" );

	if ($queryEdit) {
		echo "<script> alert ('Data User Berhasil Diubah'); window.location = '$base_url'+'main.php?module=user';</script>";
	}
	else {
		echo "<script> alert('Data User Gagal Diubah'); window.location='$base_url'+'main.php?module=edit_user&id_login='+'$idLogin';</script>";
	}
}
?>