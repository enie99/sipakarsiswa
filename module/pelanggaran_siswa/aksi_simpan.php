<?php
    include "../../lib/config.php";
    include "../../lib/koneksi.php";

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
    


    $querySimpan = mysqli_query($connect,"INSERT INTO detail_poin (tanggal, tahun_ajaran, nis, id_pelanggaran, ket) VALUES ('$tanggal', '$thAjaran', '$nis', '$idPelanggaran', '$ket')");

    if ($querySimpan) {
        echo "<script> alert('Data Pelanggaran Siswa Berhasil Masuk'); window.location = '$base_url'+'main.php?module=input_pelanggaran_siswa';</script>";
    }
    else {
        echo "<script> alert('Data Pelanggaran Siswa Gagal Dimasukkan'); window.location = '$base_url'+'main.php?module=tambah_pelanggaran_siswa';</script>";

    }

?>