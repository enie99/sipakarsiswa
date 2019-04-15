<?php
    include "../../lib/config.php";
    include "../../lib/koneksi.php";

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
    


    $querySimpan = mysqli_query($connect,"INSERT INTO detail_poin (tanggal, tahun_ajaran, nis, id_prestasi, ket) VALUES ('$tanggal', '$thAjaran', '$nis', '$idPrestasi', '$ket')");

    if ($querySimpan) {
        echo "<script> alert('Data Prestasi Siswa Berhasil Masuk'); window.location = '$base_url'+'main.php?module=input_prestasi_siswa';</script>";
    }
    else {
        echo "<script> alert('Data Pelanggaran Siswa Gagal Dimasukkan'); window.location = '$base_url'+'main.php?module=tambah_prestasi_siswa';</script>";

    }

?>