<?php
	$id = $_GET['id_pelayanan'];
	$query = mysqli_query($koneksi, "select * from pelayanan where id_pelayanan='$id'");
	$data = mysqli_fetch_array($query);
?>
<div class="card">
	<div class="card-header">Edit Pelayanan</div>
	<div class="card-body">
		<form method="POST">		   
		  <div class="mb-3">
		  	 <input type="hidden" value="<?php echo $data['id_pelayanan']?>" name="id_pelayanan" class="form-control" id="id_pelayanan">
		    <label class="form-label">Nama Pelayanan</label>
		    <input type="text" name="nama_pelayanan" value="<?php echo $data['nama_pelayanan']?>" class="form-control">
		  </div>
		  <div class="mb-3">
		    <label class="form-label">Jenis Pelayanan</label>
		    <input type="text" name="jenis_pelayanan" value="<?php echo $data['jenis_pelayanan']?>" class="form-control">
		  </div>
		  <div class="mb-3">
		    <label class="form-label">Harga</label>
		    <input type="text" name="harga_pelayanan" value="<?php echo $data['harga_pelayanan']?>" class="form-control">
		  </div>
		  <div class="d-flex">
		  	<input type="submit" class="btn btn-primary" name="simpan" value="Simpan">
		  	
		  <a href="?menu=data_pelayanan" type="submit" class="btn btn-danger ms-2">Cancel</a>
		  </div>
		</form>
	</div>
</div>	

<?php 
if (isset($_POST['simpan'])) {
	# code..
	$id_pelayanan = $_POST['id_pelayanan'];
	$nama_pelayanan = $_POST['nama_pelayanan'];
	$jenis_pelayanan = $_POST['jenis_pelayanan'];
	$harga_pelayanan = $_POST['harga_pelayanan'];
	mysqli_query($koneksi,"update pelayanan set nama_pelayanan = '$nama_pelayanan', jenis_pelayanan = '$jenis_pelayanan', harga_pelayanan = '$harga_pelayanan' where id_pelayanan = '$id_pelayanan'	");
 	?>
 	<script type="text/javascript">
		alert('berhasil diedit');
		document.location.href="?menu=data_pelayanan";
	</script>
	<?php
}
 
?>