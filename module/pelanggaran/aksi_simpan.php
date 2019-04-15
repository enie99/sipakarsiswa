<?php
    include "../../lib/config.php";
    include "../../lib/koneksi.php";

    //$idKatPelanggaran = $_POST['katPelanggaran'];
    $idSubKategori = $_POST['subKatPelanggaran'];
    $namaPelanggaran = $_POST['jenisPelanggaran'];
    $poin = $_POST['poin'];

    if ($poin > 0 && $poin<=125) {
        $querySimpan = mysqli_query($connect,"INSERT INTO pelanggaran (id_sub_kategori, nama_pelanggaran, poin) VALUES ('$idSubKategori', '$namaPelanggaran', '$poin')");

        if ($querySimpan) {
            echo "<script> alert('Data Master Pelanggaran Berhasil Masuk'); window.location = '$base_url'+'main.php?module=pelanggaran';</script>";
        }
        else {
            echo "<script> alert('Data Master Pelanggaran Gagal Dimasukkan'); window.location = '$base_url'+'main.php?module=tambah_pelanggaran';</script>";
        }
    }
    else{
        echo "<script> alert('Poin Tidak Boleh 0 atau Lebih Dari 125'); window.location = '$base_url'+'main.php?module=tambah_pelanggaran';</script>";   
    }
?>
