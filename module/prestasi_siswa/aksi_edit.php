<?php
session_start();
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])) {

    echo "<center>untuk mengakses modul, anda harus login <br>";
    echo "<a href=../../index.php><b>LOGIN</b></a></center>";
} else {
    include "../../lib/koneksi.php";
    include "../../lib/config.php";
    
    $idDetailPoin = $_POST['idDetailPoin'];
    $thAjaran = $_POST['thAjaran'];
    $tanggal = $_POST['tanggal'];
    $ket = $_POST['ket'];
    $siswa = $_POST['siswa'];
    $nis=substr($siswa, 0,5);

    $prestasi = $_POST['prestasi'];
    if (substr($prestasi, 2,1)=="-"){
        $idPrestasi=substr($prestasi, 0,1);    
    }elseif (substr($prestasi, 3,1)=="-") {
        $idPrestasi=substr($prestasi, 0,2);
    }else{
        $idPrestasi=substr($prestasi, 0,3);
    }
    
    $queryEdit = mysqli_query($connect,"UPDATE detail_poin SET tanggal='$tanggal', nis='$nis', id_prestasi='$idPrestasi', tahun_ajaran='$thAjaran', ket='$ket' WHERE id_detail_poin='$idDetailPoin'" );

    if ($queryEdit) {
        echo "<script> alert ('Data Prestasi Siswa Berhasil Diubah'); window.location = '$base_url'+'main.php?module=input_prestasi_siswa';</script>";
    }
    else {
        echo "<script> alert('Data Prestasi Siswa Gagal Diubah'); window.location='main.php?module=edit_prestasi_siswa&id_detail_poin='+'$idDetailPoin';</script>";
    }
}
?>