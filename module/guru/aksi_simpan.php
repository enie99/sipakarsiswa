<?php
    include "../../lib/config.php";
    include "../../lib/koneksi.php";

    $nip = $_POST['nip'];
    $namaGuru = $_POST['namaGuru'];
    $noHp = $_POST['noHp'];
    $jabatan = $_POST['jabatan'];


    $querySimpan = mysqli_query($connect,"INSERT INTO guru VALUES ('$nip', '$namaGuru', '$noHp', '$jabatan')");

    if ($querySimpan) {
        echo "<script> alert('Data guru Berhasil Masuk'); window.location = '$base_url'+'main.php?module=guru';</script>";
    }
    else {
        echo "<script> alert('Data guru Gagal Dimasukkan'); window.location = '$base_url'+'main.php?module=tambah_guru';</script>";

    }

?>