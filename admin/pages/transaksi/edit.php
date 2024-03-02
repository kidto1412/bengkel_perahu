<?php
	$nota = $_GET['nota'];
	$query = mysqli_query($koneksi, "select * from transaksi where nota='$nota'");
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
    <label class="form-label">Tanggal</label>
     <input type="date" name="tanggal" id="tanggal" class="form-control"  value="<?php echo $data['tanggal']?>" readonly> 
  </div>
    <input type="hidden" name="total_harga" value="<?php echo $data['total_harga']; ?>">
  <div class="mb-3">
        <label class="form-label">Nama Petugas</label>
        <select type="text" name="id_admin" class="form-select">
          <option>Pilih Petugas</option>
          <?php 
          $sql=mysqli_query($koneksi, "SELECT * FROM admin");
          while ($data=mysqli_fetch_array($sql)) {
         ?>
         <option value="<?php echo $data['id_admin']?>"><?php echo $data['nama']?></option>
         <?php 
          }
         ?>
           
        </select>
      </div>
      

  
 <!--  <h3 class="total_transaksi">Total Transaksi: </h3> -->
  	<input type="submit" class="btn btn-primary" name="ubah_service" value="Ubah">
</form>
</div>
</div>



<?php 
if (isset($_POST['ubah_service'])) {
	$nota = $_POST['nota'];
  $tanggal = $_POST['tanggal'];
  $id_admin = $_POST['id_admin'];
  $total_harga = $_POST['total_harga'];
	mysqli_query($koneksi,"update transaksi set tanggal= '$tanggal', id_admin = '$id_admin', total_harga = '$total_harga' where nota = '$nota'");

 	?>
 	<script type="text/javascript">
		alert('berhasil diubah');
	<?php
	$nota = $_GET['nota'];
	$query = mysqli_query($koneksi, "select * from transaksi where nota='$nota'");
	$data = mysqli_fetch_array($query);
	?>
		document.location.href="?menu=transaksi";
	</script>
	<?php
}
?>
</div>

