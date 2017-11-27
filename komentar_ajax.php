<?php 
	
	// echo $_POST['isi_komentar']; ini untuk melihat di konsole
include_once 'database.php';

$komentar = mysqli_real_escape_string($link, $_POST['isi_komentar']);
$query = "INSERT INTO komentar (isi_komentar, id_user) VALUES('$komentar', 1)";

if(mysqli_query($link, $query)){
	echo "<p>".$komentar."</p>";
}else{
	echo "Error!";
}


 ?>