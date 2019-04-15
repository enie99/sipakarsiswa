<?php
    include "../../lib/config.php";
    include "../../lib/koneksi.php";

    $idKatPelanggaran = $_POST['katPelanggaran'];
    $subKatPelanggaran = $_POST['subKatPelanggaran'];

    $querySimpan = mysqli_query($connect,"INSERT INTO sub_kat_pelanggaran (id_kat_pelanggaran,nama_sub_kategori) VALUES ('$idKatPelanggaran', '$subKatPelanggaran')");

    if ($querySimpan) {
        echo "<script> alert('Data Sub Kategori Berhasil Masuk'); window.location = '$base_url'+'main.php?module=pelanggaran';</script>";
    }
    else {
        echo "<script> alert('Data Sub Kategori Gagal Dimasukkan'); window.location = '$base_url'+'main.php?module=tambah_sub_kategori';</script>";
    }

?>