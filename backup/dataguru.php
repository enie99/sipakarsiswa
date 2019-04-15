<?php
include "../../lib/koneksi.php";

$term = trim(strip_tags($_GET['term']));
$guru=mysqli_query($connect,"SELECT * FROM guru WHERE nama_guru LIKE '".$term."%'");

while ($gr=mysqli_fetch_array($guru)) {
	$gr['value']=htmlentities(stripslashes($gr['nama_guru']));
	$gr['nip']=(char)$gr['nip'];
	//Array yg nantinya akan di konversi ke json
	$gr_set[]=$gr;
}

//Data hasil query yg dikirim kembali dalam format json
echo json_encode($gr_set);



?>