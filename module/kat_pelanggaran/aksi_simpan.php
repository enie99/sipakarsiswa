<?php
    include "../../lib/config.php";
    include "../../lib/koneksi.php";

    $namaKatPelanggaran = $_POST['namaKatPelanggaran'];

    $querySimpan = mysqli_query($connect,"INSERT INTO kat_pelanggaran (nama_kategori) VALUES ('$namaKatPelanggaran')");

    if ($querySimpan) {
        echo "<script> alert('Data Kategori Berhasil Masuk'); window.location = '$base_url'+'main.php?module=kat_pelanggaran';</script>";
    }
    else {
        echo "<script> alert('Data Kategori Gagal Dimasukkan'); window.location = '$base_url'+'main.php?module=tambah_kat_pelanggaran';</script>";
    }

?>