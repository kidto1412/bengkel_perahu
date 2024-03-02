<div class="card">
	<div class="card-header">Tambah Pelayanan</div>
	<div class="card-body">
		<form method="POST">		   
		  <div class="mb-3">
		    <label class="form-label">Nama Pelayanan</label>
		    <input type="text" name="nama_pelayanan" class="form-control" required>
		  </div>
		  <div class="mb-3">
		    <label class="form-label">Jenis Pelayanan</label>
		   <select class="form-control" name="jenis_pelayanan">
		   	<option>Pilih Jenis Pelayanan</option>
		   	<option value="Pekerjaan Ringan">Pekerjaan Ringan</option>
		   	<option value="Pekerjaan Sedang">Pekerjaan Sedang</option>
		   </select>
		  </div>
		  <div class="mb-3">
		    <label class="form-label">Harga</label>
		    <input type="text" name="harga_pelayanan" class="form-control" required>
		  </div>
		  <div class="d-flex">
		  	<input type="submit" class="btn btn-primary" name="simpan" value="Simpan">
		  	
		  <a href="?menu=data_pelayanan" type="submit" class="btn btn-danger ms-2">Batal</a>
		  </div>
		</form>
	</div>
</div>	

<?php 
if (isset($_POST['simpan'])) {
	# code...
	$nama_pelayanan = $_POST['nama_pelayanan'];
	$jenis_pelayanan = $_POST['jenis_pelayanan'];
	$harga_pelayanan = $_POST['harga_pelayanan'];
	mysqli_query($koneksi,"insert into pelayanan values('','$nama_pelayanan','$jenis_pelayanan', '$harga_pelayanan')");
 	?>
 	<script type="text/javascript">
		alert('berhasil disimpan');
		document.location.href="?menu=data_pelayanan";
	</script>
	<?php
}
 
?>