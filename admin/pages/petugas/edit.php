<?php
$id_user = $_GET['id_user'];
$query = mysqli_query($koneksi, "select * from user where id_user='$id_user'");
$data = mysqli_fetch_array($query);
?>
<div class="card">
	<div class="card-header">Tambah Perahu</div>
	<div class="card-body">
		<form method="POST">
		  <div class="mb-3">
		    <!-- <label for="" class="form-label">Kode Perahu</label> -->
		    <!-- <input type="text" disabled value="<?php echo $data['kd_perahu']?>" name="kd_perahu" class="form-control" id="kd_perahu"> -->
		    <input type="hidden" value="<?php echo $data['id_user']?>" name="id_user" class="form-control">
		   <div class="mb-3">
		    <label class="form-label">nama</label>
		    <input type="text" name="nama" value="<?php echo $data['nama']?>" class="form-control">
		  </div>
		  <div class="mb-3">
		    <label class="form-label">Username</label>
		    <input type="text" name="username" value="<?php echo $data['username']?>" class="form-control">
		  </div>
		  <div class="mb-3">
		    <label class="form-label">Password</label>
		    <input type="text" name="password" value="<?php echo $data['password']?>" class="form-control">
		  </div>
		    <div class="mb-3">
		    <label class="form-label">Role</label>
		    <input type="text" name="role" value="<?php echo $data['role']?>" class="form-control">
		  </div>
		  <div class="d-flex">
		  	<input type="submit" class="btn btn-primary" name="simpan" value="Simpan">
		  	
		  <a href="?menu=data_perahu" type="submit" class="btn btn-danger ms-2">Cancel</a>
		  </div>
		</form>
	</div>
</div>	

<?php 
if (isset($_POST['simpan'])) {
	# code...
	$id_user = $_POST['id_user'];
	$nama = $_POST['nama'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	mysqli_query($koneksi,"update user set nama='$nama',username='$username',password='$password' ,password='$password' where id_user = '$id_user' ");
 	?>
 	<script type="text/javascript">
		alert('berhasil diedit');
		document.location.href="?menu=data_petugas";
	</script>
	<?php
}
 
?>