<?php
// definisikan koneksi ke database
$server = "localhost";
$username = "root";
$password = "";
$database = "pembinaan_karakter";

// Koneksi dan memilih database di server
//mysql_connect($server,$username,$password) or die("Koneksi gagal");
//mysql_select_db($database) or die("Database tidak bisa dibuka");

// melakukan koneksi ke database
 $connect = new mysqli($server,$username,$password,$database);
 
// cek koneksi yang kita lakukan berhasil atau tidak
 if ($connect->connect_error) {
    // jika terjadi error, matikan proses dengan die() atau exit();
    die('Maaf koneksi gagal: '. $connect->connect_error);
}
?>