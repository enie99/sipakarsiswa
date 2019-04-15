<?php
    include "../../lib/config.php";
    include "../../lib/koneksi.php";

    $namaOrtu = $_POST['namaOrtu'];
    $noHp = $_POST['noHp'];
    $alamat = $_POST['alamat'];

    $querySimpan = mysqli_query($connect,"INSERT INTO orang_tua (nama_ortu, no_hp, alamat_ortu) VALUES ('$namaOrtu', '$noHp', '$alamat')");

    if ($querySimpan) {
        echo "<script> alert('Data Orang Tua Berhasil Masuk'); window.location = '$base_url'+'main.php?module=ortu';</script>";
    }
    else {
        echo "<script> alert('Data Orang Tua Gagal Dimasukkan'); window.location = '$base_url'+'main.php?module=tambah_ortu';</script>";
    }

?>