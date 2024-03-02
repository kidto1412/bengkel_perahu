<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
	<link rel="stylesheet" type="text/css" href="dist/css/bootstrap.min.css">
</head>
<body style="background-color:#F5F2EA;">
<div class="container mt-5">

	<div class="card mx-auto mb-4" style="width:50%">
		<!-- <div class="card-header bg-primary text-white">Login Page</div> -->
		<div class="card-body">
			<img src="dist/logo_kpp.png" class="d-block mx-auto" width="100">
			<h3 class="text-center">Halaman Login</h2>
			<p class="text-center">Selamat datang di aplikasi perahu</p>
			<?php 
				if(isset($_GET['pesan'])){
					if($_GET['pesan'] == "gagal"){
						echo "<p class='text-danger'>Login gagal! username dan password salah!</p>";
					}else if($_GET['pesan'] == "logout"){
						echo "<p class='text-success'>Anda telah berhasil logout</p>";
					}else if($_GET['pesan'] == "belum_login"){
						echo "<p class='text-warning'>Anda harus login untuk mengakses halaman admin</p>";
					}
				}
				?>
			<form method="POST" action="proslog.php">
			  <div class="mb-3">
			    <label for="exampleInputEmail1"  class="form-label">Username</label>
			    <input type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
			  </div>
			  <div class="mb-3">
			    <label for="exampleInputPassword1" class="form-label">Password</label>
			    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
			  </div>
			  <!-- <input type="submit" class="btn block btn-primary" value="Login"> -->
			  <div class="d-grid gap-2 col-6 mx-auto">
			  <input type="submit" class="btn block btn-warning text-white" value="Login">
			  <hr>
			  <p class="text-disable fw-light">create by aplikasi bengkel perahu</p>
			</div>
			</form>
		</div>
	</div>
</div>

<script src="dist/js/bootstrap.min.js"></script>
</body>
</html>