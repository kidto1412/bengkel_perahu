<?php 
$koneksi = mysqli_connect("localhost","root","","bengkel_perahu");

// Check connection
if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}

?>