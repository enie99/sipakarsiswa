<?php
    include "../../lib/config.php";
    include "../../lib/koneksi.php";

    $namaJurusan = $_POST['namaJurusan'];

    $querySimpan = mysqli_query($connect,"INSERT INTO jurusan (nama_jurusan) VALUES ('$namaJurusan')");

    if ($querySimpan) {
        echo "<script> alert('Data Jurusan Berhasil Masuk'); window.location = '$base_url'+'main.php?module=jurusan';</script>";
    }
    else {
        echo "<script> alert('Data Jurusan Gagal Dimasukkan'); window.location = '$base_url'+'main.php?module=tambah_jurusan';</script>";
    }

?>