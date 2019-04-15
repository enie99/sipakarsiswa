<?php
session_start();
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])) {

    echo "<center>untuk mengakses modul, anda harus login <br>";
    echo "<a href=../../index.php><b>LOGIN</b></a></center>";
} else {
    include "../../lib/koneksi.php";
    include "../../lib/config.php";
    
    $idSubKategori = $_POST['idSubKategori'];
    $idKatPelanggaran = $_POST['katPelanggaran'];
    $namaSubKategori = $_POST['subKatPelanggaran'];
    
    $queryEdit = mysqli_query($connect,"UPDATE sub_kat_pelanggaran SET nama_sub_kategori ='$namaSubKategori', id_kat_pelanggaran='$idKatPelanggaran' WHERE id_sub_kategori='$idSubKategori'" );

    if ($queryEdit) {
        echo "<script> alert ('Data Sub Kategori Pelanggaran Berhasil Diubah'); window.location = '$base_url'+'main.php?module=pelanggaran';</script>";
    }
    else {
        echo "<script> alert('Data Sub Kategori Pelanggaran Gagal Diubah'); window.location='main.php?module=edit_sub_kategori&id_sub_kategori='+'$idSubKategori';</script>";
    }
}
?>