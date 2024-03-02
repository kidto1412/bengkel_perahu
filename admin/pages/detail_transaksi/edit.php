<?php
	$nota = $_GET['nota'];
	$id_pelayanan = $_GET['id_pelayanan'];
	$query = mysqli_query($koneksi, "select * from detail_transaksi where nota='$nota' AND id_pelayanan = '$id_pelayanan' ");
	$data = mysqli_fetch_array($query);
?>
<div class="card mb-5">
	<div class="card-header bg-primary text-white">Transaksi</div>
	<div class="card-body">
<form method="POST">
 <div class="mb-3">
    <label class="form-label">Nota</label>
      <input type="text" name="nota" id="nota" class="form-control" readonly value="<?php echo $data['nota']?>"> 
  </div>
  <div class="mb-3">
    <label class="form-label">Quantity</label>
      <input type="text" name="jumlah" class="form-control" value="<?php echo $data['jumlah'] ?>"> 
  </div>
   <div class="mb-3">
    <label class="form-label">Keterangan</label>
       <input type="text" name="keterangan" class="form-control" value="<?php echo $data['keterangan'] ?>" > 
  </div>

   <div class="mb-3">
   	<input type="hidden" name="id_pelayanan" value="<?php echo$data['id_pelayanan'];?>">
    </div>
 <!--  <h3 class="total_transaksi">Total Transaksi: </h3> -->
  	<input type="submit" class="btn btn-primary" name="ubah_detail" value="Ubah">
</form>
</div>
</div>



<?php 
if (isset($_POST['ubah_detail'])) {
	# code...
	$nota = $_POST['nota'];
	$id_pelayanan = $_POST['id_pelayanan'];
	// $tanggal = $_POST['tanggal'];
	$jumlah = $_POST['jumlah'];
	$keterangan = $_POST['keterangan'];
	mysqli_query($koneksi,"update detail_transaksi set jumlah = '$jumlah', keterangan = '$keterangan' where nota = '$nota' AND id_pelayanan = '$id_pelayanan'");
?>
 	<script type="text/javascript">
		alert('berhasil ditambahkan');
	<?php
	$nota = $_GET['nota'];
	$query = mysqli_query($koneksi, "select * from transaksi where nota='$nota'");
	$data = mysqli_fetch_array($query);
	?>
		document.location.href="?menu=bayar&nota=<?php echo $data['nota']; ?>";
	</script>
	<?php
 	
}
?>
</div>

