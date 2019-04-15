<?php
    include "lib/config.php";
    include "lib/koneksi.php";

    $idKelas = $_GET['id_kelas'];

    $cariKelas=mysqli_query($connect, "SELECT * FROM kelas JOIN jurusan ON kelas.id_jurusan=jurusan.id_jurusan WHERE id_kelas='$idKelas'");
    $kelas=mysqli_fetch_array($cariKelas);
    $tingkatKelas=$kelas['tingkat_kelas'];
    $jurusan=$kelas['id_jurusan'];
    $subKelas=$kelas['sub_kelas'];

    if ($tingkatKelas=="XIII") {
        $cariSiswa=mysqli_query($connect, "SELECT * FROM siswa JOIN kelas ON siswa.id_kelas=kelas.id_kelas WHERE siswa.id_kelas='$idKelas'");
        while ($lulus=mysqli_fetch_array($cariSiswa)) {
            $nis=$lulus['nis'];
            $nama=$lulus['nama_siswa'];
            $jurusan=$lulus['id_jurusan'];
            $subKelas=$lulus['sub_kelas'];
            $idOrtu=$lulus['id_ortu'];
            $tahun=date('Y');
            $alamat=$lulus['alamat'];

            $queryLulus=mysqli_query($connect, "INSERT INTO alumni VALUES ('$nis', '$nama', '$tahun', '$jurusan', '$subKelas', '$idOrtu', '$alamat')");
            $queryHapus=mysqli_query($connect,"DELETE FROM siswa WHERE nis='$nis'");    
        }
    }
    elseif ($tingkatKelas=="X") {
        $cariIdKelas=mysqli_query($connect, "SELECT id_kelas FROM kelas WHERE tingkat_kelas='XI' AND id_jurusan='$jurusan' AND sub_kelas='$subKelas'");
        $ketemuKelas=mysqli_fetch_array($cariIdKelas);
        $idKelasBaru=$ketemuKelas['id_kelas'];

        $cariSiswa=mysqli_query($connect, "SELECT * FROM siswa WHERE id_kelas='$idKelas'");
        while ($naik=mysqli_fetch_array($cariSiswa)) {
            $queryEdit=mysqli_query($connect, "UPDATE siswa SET id_kelas='$idKelasBaru' WHERE nis='$naik[nis]'");
                
        }
    }
    elseif ($tingkatKelas=="XI") {
        $cariIdKelas=mysqli_query($connect, "SELECT id_kelas FROM kelas WHERE tingkat_kelas='XII' AND id_jurusan='$jurusan' AND sub_kelas='$subKelas'");
        $ketemuKelas=mysqli_fetch_array($cariIdKelas);
        $idKelasBaru=$ketemuKelas['id_kelas'];

        $cariSiswa=mysqli_query($connect, "SELECT * FROM siswa WHERE id_kelas='$idKelas'");      
        while ($naik=mysqli_fetch_array($cariSiswa)) {
            $queryEdit=mysqli_query($connect, "UPDATE siswa SET id_kelas='$idKelasBaru' WHERE nis='$naik[nis]'");
                
        }
    }
    elseif ($tingkatKelas=="XII") {
        $cariIdKelas=mysqli_query($connect, "SELECT id_kelas FROM kelas WHERE tingkat_kelas='XIII' AND id_jurusan='$jurusan' AND sub_kelas='$subKelas'");
        $ketemuKelas=mysqli_fetch_array($cariIdKelas);
        $idKelasBaru=$ketemuKelas['id_kelas'];

        $cariSiswa=mysqli_query($connect, "SELECT * FROM siswa WHERE id_kelas='$idKelas'");
        while ($naik=mysqli_fetch_array($cariSiswa)) {
            $queryEdit=mysqli_query($connect, "UPDATE siswa SET id_kelas='$idKelasBaru' WHERE nis='$naik[nis]'");
                
        }
    }
    else{
        echo "<script> alert('Kelas tidak diketahui'); window.location = '$base_url'+'main.php?module=detail_kelas';</script>";
    }



    if ($queryLulus OR $queryHapus OR $queryEdit) {
        echo "<script> alert('Siswa Berhasil Naik Kelas / Lulus'); window.location = '$base_url'+'main.php?module=kelas';</script> ";
    }
    else {     
        echo "<script> alert('Kenaikan Kelas Gagal Dilakukan'); window.location = '$base_url'+'main.php?module=detail_kelas'; </script>";
    }

?>