<?php
/*include "../../lib/koneksi.php";

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
*/

 //database configuration
    $dbHost = 'localhost';
    $dbUsername = 'root';
    $dbPassword = '';
    $dbName = 'pembinaan_karakter';
    
    //connect with the database
    $db = new mysqli($dbHost,$dbUsername,$dbPassword,$dbName);
    
    //get search term
    $searchTerm = $_GET['term'];
    
    //get matched data from skills table
    $query = $db->query("SELECT * FROM guru WHERE nama_guru LIKE '%".$searchTerm."%' ORDER BY nama_guru ASC");
    while ($row = $query->fetch_assoc()) {
        $data[] = $row['nama_guru'];
    }
    
    //return json data
    echo json_encode($data);


?>