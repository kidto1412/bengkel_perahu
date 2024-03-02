<div class="card">
	<div class="card-header">Tambah Petugas</div>
	<div class="card-body">
		<form method="POST">
		  <div class="mb-3">
		    <label class="form-label">Nama Lengkap</label>
		    <input type="text" name="nama" class="form-control" required>
		  </div>
		    <div class="mb-3">
		    <label class="form-label">Username</label>
		    <input type="text" name="username" class="form-control" required>
		  </div>
		   <div class="mb-3">
		    <label class="form-label">Password</label>
		    <input type="text" name="password" class="form-control" required>
		  </div>
		  <div class="mb-3">
		    <label class="form-label">Role</label>
		    <select name="role" class="form-control" required>
		    	<option>Pilih Role</option>
		    	<option value="admin">Admin</option>
		    	<option value="petugas">Petugas</option>
		    </select>
		  </div>
		  <div class="d-flex">
		  <input type="submit" class="btn btn-primary" name="simpan" value="Simpan">
		  	
		  <a href="?menu=data_perahu" type="submit" class="btn btn-danger ms-2">Batal</a>
		  </div>
		</form>
	</div>
</div>	

<?php 
include 'petugas.php';

if (isset($_POST['simpan'])) {
	# code...
	$nama = trim($_POST['nama']);
	$username =trim($_POST['username']);
	$password = trim($_POST['password']);
	$role = $_POST['role'];
	$petugas = new petugas();
	// mysqli_query($koneksi,"insert into user values('','$nama','$username','$password','$role')");
	$petugas->insert($nama,$username,$password,$role);
}
 
?>