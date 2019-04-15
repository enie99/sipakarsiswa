<?php
    include "../../lib/config.php";
    include "../../lib/koneksi.php";

    $namaPrestasi = $_POST['namaPrestasi'];
    $poin = $_POST['poin'];

    $querySimpan = mysqli_query($connect,"INSERT INTO prestasi (nama_prestasi, poin) VALUES ('$namaPrestasi', '$poin')");

    if ($querySimpan) {
        echo "<script> alert('Data Prestasi Berhasil Masuk'); window.location = '$base_url'+'main.php?module=prestasi';</script>";
    }
    else {
        echo "<script> alert('Data Prestasi Gagal Dimasukkan'); window.location = '$base_url'+'main.php?module=tambah_prestasi';</script>";
    }

?>