<?php
    include "../../lib/config.php";
    include "../../lib/koneksi.php";

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
    
    if (is_numeric($namaSiswa)) {
        echo "<script> alert('Nama Siswa Hanya Boleh Huruf dan Spasi'); window.location = '$base_url'+'main.php?module=tambah_siswa';</script>";
    }else{
    
        $querySimpan = mysqli_query($connect,"INSERT INTO siswa VALUES ('$nis', '$namaSiswa', '$thAngkatan', '$alamat', '$idKelas', '$idOrtu')");

        if ($querySimpan) {
            echo "<script> alert('Data siswa Berhasil Masuk'); window.location = '$base_url'+'main.php?module=siswa';</script>";
        }
        else {
            echo "<script> alert('Data siswa Gagal Dimasukkan'); window.location = '$base_url'+'main.php?module=tambah_siswa';</script>";

        }
    }

?>