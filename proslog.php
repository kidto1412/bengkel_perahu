<?php 
// mengaktifkan session php
session_start();
 
// menghubungkan dengan koneksi
include 'koneksi.php';
 
// menangkap data yang dikirim dari form
$username = $_POST['username'];
// $password = md5($_POST['password']);
$password = $_POST['password'];
 
// menyeleksi data admin dengan username dan password yang sesuai
$data = mysqli_query($koneksi,"select * from user where username='$username' and password='$password'");
 
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($data);
$row = mysqli_fetch_array($data);
if($cek > 0){
	if ($row['role'] == 'admin') {
		$_SESSION['username'] = $username;
		$_SESSION['id_user'] = $row['id_user'];
		$_SESSION['status'] = "login";
		$_SESSION['role'] = $row['role'];
		?>
		<script type="text/javascript">
        alert('berhasil login');
          document.location.href="admin/index.php";
        </script>;
        <?php
	} else if($row['role'] == 'petugas') {
		$_SESSION['username'] = $username;
		$_SESSION['id_user'] = $row['id_user'];
		$_SESSION['status'] = "login";
		$_SESSION['role'] = $row['role'];
		?>
		<script type="text/javascript">
        alert('berhasil login');
          document.location.href="admin/index.php";
        </script>;
        </script>;
        <?php
	} 
	?>
     <?php
}else{
	header("location:index.php?pesan=gagal");
}
?>