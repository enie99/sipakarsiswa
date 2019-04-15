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

    $pelanggaran = $_POST['pelanggaran'];
    if (substr($pelanggaran, 2,1)=="-"){
        $idPelanggaran=substr($pelanggaran, 0,1);    
    }elseif (substr($pelanggaran, 3,1)=="-") {
        $idPelanggaran=substr($pelanggaran, 0,2);
    }else{
        $idPelanggaran=substr($pelanggaran, 0,3);
    }
    
    $queryEdit = mysqli_query($connect,"UPDATE detail_poin SET tanggal='$tanggal', nis='$nis', id_pelanggaran='$idPelanggaran', tahun_ajaran='$thAjaran', ket='$ket' WHERE id_detail_poin='$idDetailPoin'" );

    if ($queryEdit) {
        echo "<script> alert ('Data Pelanggaran Siswa Berhasil Diubah'); window.location = '$base_url'+'main.php?module=input_pelanggaran_siswa';</script>";
    }
    else {
        echo "<script> alert('Data Pelanggaran Siswa Gagal Diubah'); window.location='main.php?module=edit_pelanggaran_siswa&id_detail_poin='+'$idDetailPoin';</script>";
    }
}
?>