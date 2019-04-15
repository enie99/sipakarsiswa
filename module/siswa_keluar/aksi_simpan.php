<?php
    include "../../lib/config.php";
    include "../../lib/koneksi.php";

    $siswa = $_POST['siswa'];
    $nis=substr($siswa, 0,5);

    $cariSiswa=mysqli_query($connect, "SELECT * FROM siswa JOIN kelas ON siswa.id_kelas=kelas.id_kelas JOIN jurusan ON kelas.id_jurusan=jurusan.id_jurusan WHERE siswa.nis='$nis'");
    
    $keluar=mysqli_fetch_array($cariSiswa);
            $nama=$keluar['nama_siswa'];
            $jurusan=$keluar['id_jurusan'];
            $tahunKeluar=date('Y');

            $queryKeluar=mysqli_query($connect, "INSERT INTO siswa_do VALUES ('$nis', '$nama', '$tahunKeluar', '$jurusan')");
            $queryHapus=mysqli_query($connect,"DELETE FROM siswa WHERE nis='$nis'");    

    if ($queryKeluar AND $queryHapus) {
        echo "<script> alert('Siswa Telah Dikeluarkan'); window.location = '$base_url'+'main.php?module=siswa_keluar';</script>";
    }
    else {     
        echo "<script> alert('Siswa Gagal Dikeluarkan'); window.location = '$base_url'+'main.php?module=siswa_keluar'; </script>";
    }

?>