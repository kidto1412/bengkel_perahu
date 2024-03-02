<?php
	$nota = $_GET['nota'];
  $id_pelayanan = $_GET['id_pelayanan'];
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
   <div class="mb-3">
    <label class="form-label">Pelayanan</label>
     <select type="text" name="id_pelayanan" id="id_pelayanan" class="form-select js-example-basic-single" onchange='changeValue(this.value)'>
    	<option>Pilih Pelayanan</option>
    	<?php 
    	  $query = mysqli_query($koneksi, "select * from pelayanan order by id_pelayanan desc");  
		  $result=mysqli_query($koneksi, "SELECT * FROM pelayanan");
		   $a = "var harga = new Array();\n;";  
		   $b = "var total_harga = new Array();\n;";  
		  while ($data=mysqli_fetch_array($result)) {
		  	?>
		  	<option value="<?php echo $data['id_pelayanan']?>"><?php echo $data['nama_pelayanan']?></option>
		  	<?php
		  	 $a .= "harga['" . $data['id_pelayanan'] . "'] = {harga:'" . addslashes($data['harga_pelayanan'])."'};\n";  
		  	 $b .= "total_harga['" . $data['id_pelayanan'] . "'] = {total_harga:'" . addslashes($data['harga_pelayanan'])."'};\n";  
		  	 // $c .= "total['" . $data['id_pelayanan'] . "'] = {jenis_pelayanan:'" . addslashes($data['jenis_pelayanan'])."'};\n";  
		  	 	// $total_harga = $total_harga + $data['harga_pelayanan'];
		 ?>
		 
		 <?php 
			}
		 ?>
    </select>
     <script type="text/javascript">   
      <?php   
      	echo $a;  
      	echo $b;   
      	 ?>  
      	function changeValue(id){  
      	document.getElementById('harga').value = harga[id].harga;  
      };  
    </script>  

  <div class="mb-3">
    <label class="form-label">harga</label>
      <input type="text" name="harga" id="harga" class="form-control" readonly required>  
  </div>
  <div class="mb-3">
    <label class="form-label">Quantity</label>
      <input type="text" name="jumlah" class="form-control" required> 
  </div>
   <div class="mb-3">
    <label class="form-label">Keterangan</label>
       <input type="text" name="keterangan" class="form-control" required> 
  </div>
 <!--  <h3 class="total_transaksi">Total Transaksi: </h3> -->
  	<input type="submit" class="btn btn-primary" name="tambah_service" value="Simpan">
     <a href="?menu=transaksi" type="submit" class="btn btn-danger ms-2">Batal</a>
</form>
</div>
</div>



<?php 
if (isset($_POST['tambah_service'])) {
	# code...
	$nota = $_POST['nota'];
	$id_pelayanan = $_POST['id_pelayanan'];
	// $tanggal = $_POST['tanggal'];
	$jumlah = $_POST['jumlah'];
	$keterangan = $_POST['keterangan'];
	// $cek_pel = mysqli_query($koneksi,"SELECT id_pelayanan FROM detail_transaksi WHERE id_pelayanan='$id_pelayanan'");
  // echo $cek_pel;
	// if ($cek_pel && $cek_pel['jumlah'] == 0) {
		# code...
	mysqli_query($koneksi,"insert into detail_transaksi values('', '$nota','$id_pelayanan', '$jumlah','$keterangan')");

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
<div class="card mb-5">
	<div class="card-header">List Service</div>
	<table class="table">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Pelayanan</th>
      <th scope="col">Jumlah</th>
      <th scope="col">Harga</th>
      <th scope="col">Keterangan</th>
       <th scope="col">Subtotal</th>
       <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
  	<?php 
   	$nota = $_GET['nota'];
    $id_pelayanan = $_GET['id_pelayanan'];
    $data = mysqli_query($koneksi, "SELECT SUM(detail_transaksi.jumlah) as jumlah, transaksi.nota, transaksi.tanggal, transaksi.total_harga,pelayanan.id_pelayanan,pelayanan.nama_pelayanan, pelayanan.jenis_pelayanan, pelayanan.harga_pelayanan,detail_transaksi.keterangan FROM `pelayanan` inner join detail_transaksi INNER JOIN transaksi ON pelayanan.id_pelayanan = detail_transaksi.id_pelayanan AND transaksi.nota = detail_transaksi.nota WHERE transaksi.nota like '$nota' AND transaksi.tanggal = transaksi.tanggal AND MONTH(transaksi.tanggal) AND YEAR(transaksi.tanggal) AND pelayanan.id_pelayanan = pelayanan.id_pelayanan GROUP BY pelayanan.id_pelayanan, transaksi.nota ORDER by transaksi.nota");
    // SELECT * FROM detail_transaksi A INNER JOIN transaksi B ON A.nota = B.nota INNER JOIN pelayanan C ON A.id_pelayanan = a.id_pelayanan WHERE a.nota='$nota' GROUP BY a.id_pelayanan;
    $nomor = 1;
    $total = 0;
    function rupiah($angka){
      
      $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
      return $hasil_rupiah;
     
    }
    while($d = mysqli_fetch_array($data)){
    	 $subtotal = $d['harga_pelayanan'] * $d['jumlah'];
       $total2 = $total + $subtotal;  
    	 $total = rupiah($total + $subtotal);

    ?>
 	<tr>
 		<td><?php echo $nomor++; ?></td>
 		<td><?php echo $d['nama_pelayanan']; ?></td>
 		<td><?php echo $d['jumlah']; ?></td>
 		<td><?php echo rupiah($d['harga_pelayanan']); ?></td>
 		<td><?php echo $d['keterangan']; ?></td>
 		<td><?php echo rupiah($subtotal); ?></td>
 		<!-- <td> <a  class="btn btn-danger" onclick="return confirm('anda yakin ingin menghapusnya?')" href="?menu=hapus_transaksi&nota=<?php echo $d['nota']; ?>" title="Hapus">Hapus</a></td> -->
 		<td>
 			 <a  class="btn btn-warning " title="Edit" href="?menu=edit_detail&nota=<?php echo $d['nota']; ?>&id_pelayanan=<?php echo $d['id_pelayanan']?>"> Edit </a>
       <a  class="btn btn-danger" onclick="return confirm('anda yakin ingin menghapusnya?')" title="Delete" href="?menu=delete_detail&nota=<?php echo $d['nota']; ?>&id_pelayanan=<?php echo $d['id_pelayanan']?>"> Delete </a>
 		</td>
 	</tr>
 	  <?php 
        }
      ?>
 	<tr>
 		<td colspan="6"><h6> Total harga</h6></td>
 		<td>
 			<div>
 				 <p><?php echo $total; ?></p>
 			</div>
 		</td>
 	</tr>
 	<tr>
 		 <?php 
    $nota = $_GET['nota'];
    $data = mysqli_query($koneksi, "SELECT * FROM detail_transaksi A INNER JOIN transaksi B ON A.nota = B.nota INNER JOIN pelayanan C ON C.id_pelayanan = a.id_pelayanan where a.nota = '$nota'");
   $row = mysqli_fetch_array($data)
   ?>
    <td colspan="7">
      <?php
        if ($row['total_harga'] > 0) {
          ?>
          <a class="btn btn-info text-right" href="pages/detail_transaksi/cetaktransaksi.php?nota=<?php echo $row['nota']; ?>"> Cetak </a>
          <?php
        } else {
          ?>
          <div></div>
          <?php
        }
      ?>
    </td>
 	</tr>
  </tbody>
</table>
</div>
<?php
	$nota = $_GET['nota'];
	$query = mysqli_query($koneksi, "select * from transaksi where nota='$nota'");
	$data = mysqli_fetch_array($query);
?>
<form method="POST" class="mb-5" action="?menu=simpan_transaksi"> 
	<input type="hidden" name="nota" value="<?php echo $data['nota']; ?>">
	<input type="hidden" name="total_harga" value="<?php echo $total2; ?>">
	<input type="submit" name="simpan_transaksi" class="btn btn-success" value="Simpan Transaksi">
</form>
