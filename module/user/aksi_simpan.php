<?php
    include "../../lib/config.php";
    include "../../lib/koneksi.php";

    $username = $_POST['username'];
    $password = $_POST['password'];
    $pass = md5($password);
    
    $siswa = $_POST['siswa'];
    $nis=substr($siswa, 0,5);
    
    $guru = $_POST['guru'];
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


    $querySimpan = mysqli_query($connect,"INSERT INTO user (username, password, nip, nis, id_ortu, hak_akses) VALUES ('$username', '$pass', '$nip', '$nis', '$idOrtu', '$hakAkses')");

    if ($querySimpan) {
        echo "<script> alert('Data User Berhasil Masuk'); window.location = '$base_url'+'main.php?module=user';</script>";
    }
    else {
        echo "<script> alert('Data User Gagal Dimasukkan'); window.location = '$base_url'+'main.php?module=tambah_user';</script>";

    }

?>