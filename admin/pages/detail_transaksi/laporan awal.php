<div class="alert alert-secondary" role="alert">
    <li class="breadcrumb-item active" aria-current="page">  
       Dashboard/Laporan
    </li>
</div>
<form method="POST" action="?menu=laporan">
	<div class="d-flex" style="width: 50%;" >
	<select class="form-select" name="bulan" id="bulan" aria-label="Default select example">

   <?php if(isset($_POST['bulan'])): ?>
<option value="<?= $_POST['bulan']; ?>"><?= $_POST['bulan']; ?></option>
<?php endif; ?>
    <option>Pilih Bulan</option>
	<option value="1">1</option>
	<option value="2">2</option>
	<option value="3">3</option>
	<option value="4">4</option>
	<option value="5">5</option>
	<option value="6">6</option>
	<option value="7">7</option>
	<option value="8">8</option>
	<option value="9">9</option>
	<option value="10">10</option>
	<option value="11">11</option>
	<option value="12">12</option>
</select>
<?php
  $tahun = isset($_POST["tahun"]) ? $_POST["tahun"] : "";
?>
<input type="text" class="form-control ms-2" name="tahun" id="tahun" placeholder="Masukan Tahun" value="<?= $tahun; ?>">

<button type="submit" class="btn btn-success ms-2">Filter </button>
<a href="" class="btn btn-danger ms-2">Reset</a>
</div>
</form>
<?php 
	if (isset($_POST['bulan'])) {
		$bulan = date($_POST['bulan']);
		$tahun = $_POST['tahun'];
		if (!empty($bulan) && !empty($tahun)) {
		  // perintah tampil data berdasarkan periode bulan
		  $q = mysqli_query($koneksi, "SELECT SUM(detail_transaksi.jumlah) as jumlah,transaksi.nota, transaksi.tanggal, transaksi.total_harga,pelayanan.nama_pelayanan, pelayanan.jenis_pelayanan, pelayanan.harga_pelayanan,detail_transaksi.keterangan FROM `pelayanan` inner join detail_transaksi INNER JOIN transaksi ON pelayanan.id_pelayanan = detail_transaksi.id_pelayanan AND transaksi.nota = detail_transaksi.nota WHERE transaksi.tanggal = transaksi.tanggal AND pelayanan.id_pelayanan = pelayanan.id_pelayanan AND MONTH(transaksi.tanggal) = '$bulan' and YEAR(transaksi.tanggal) = '$tahun' GROUP BY pelayanan.id_pelayanan ORDER BY transaksi.nota;");
		   ;
		   echo '<input type="button" id="cetak" class="btn btn-secondary mt-3" value="Cetak">';
		   // echo '<a href="pages/detail_transaksi/cetaklaporanbulan.php?bulan='.$_POST['bulan'].'&tahun=$POST[''] '.'" class="btn btn-secondary mt-3">Cetak</a>';
		 }
		  else {
		  // perintah tampil semua data
		  $q = mysqli_query($koneksi, "SELECT SUM(detail_transaksi.jumlah) as jumlah, transaksi.nota, transaksi.tanggal, transaksi.total_harga,pelayanan.nama_pelayanan, pelayanan.jenis_pelayanan, pelayanan.harga_pelayanan,detail_transaksi.keterangan FROM `pelayanan` inner join detail_transaksi INNER JOIN transaksi ON pelayanan.id_pelayanan = detail_transaksi.id_pelayanan AND transaksi.nota = detail_transaksi.nota WHERE transaksi.tanggal = transaksi.tanggal AND MONTH(transaksi.tanggal) AND YEAR(transaksi.tanggal) AND pelayanan.id_pelayanan = pelayanan.id_pelayanan GROUP BY pelayanan.id_pelayanan, transaksi.nota ORDER by transaksi.nota;");
		   echo '<a href="?menu=cetaktransaksi" class="btn btn-secondary mt-3">Cetak</a>';
		 }
		} else {
		 // perintah tampil semua data
		 $q = mysqli_query($koneksi, "SELECT SUM(detail_transaksi.jumlah) as jumlah, transaksi.nota, transaksi.tanggal, transaksi.total_harga,pelayanan.nama_pelayanan, pelayanan.jenis_pelayanan, pelayanan.harga_pelayanan,detail_transaksi.keterangan FROM `pelayanan` inner join detail_transaksi INNER JOIN transaksi ON pelayanan.id_pelayanan = detail_transaksi.id_pelayanan AND transaksi.nota = detail_transaksi.nota WHERE transaksi.tanggal = transaksi.tanggal AND MONTH(transaksi.tanggal) AND YEAR(transaksi.tanggal) AND pelayanan.id_pelayanan = pelayanan.id_pelayanan GROUP BY pelayanan.id_pelayanan, transaksi.nota ORDER by transaksi.nota;");
		   echo '<a href="?menu=cetaktransaksi" class="btn btn-secondary mt-3">Cetak</a>';
		}

		// hitung jumlah baris data
		$s = $q->num_rows;

?>

<script type="text/javascript">
	$(document).ready(function(){
		$('#cetak').on('click', function () {
		// body...
		var bulan = $("#bulan").val()
		var tahun = $("#tahun").val()
		window.open('pages/detail_transaksi/cetaklaporanbulan.php?bulan='+bulan+'&tahun='+tahun,'_blank')
	})
	})
</script>
<div class="card mt-4 mb-5">
	<div class="card-header">Laporan Perbulan</div>
	<div class="card-body">
  <table class="table">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nota</th>
      <th>Nama Pelayanan</th>
      <th>Jenis Pelayanan</th>
      <th scope="col">Jumlah</th>
      <th scope="col">Tanggal</th>
      <th>Total Harga</th>

    </tr>
  </thead>
  <tbody>
   <?php
      
      $no = 1;
      $total_pendapatan = 0;
      while ($r = $q->fetch_assoc()) {
      $total_pendapatan = $total_pendapatan + $r['total_harga'];
      ?>

      <tr>
       <td><?= $no++ ?></td>
       <td><?= ucwords($r['nota']) ?></td>
       <td><?= $r['nama_pelayanan'] ?></td>
       <td><?= $r['jenis_pelayanan'] ?></td>
       <td><?= $r['jumlah'] ?></td>
       <td><?= date('d-M-Y', strtotime($r['tanggal'])) ?></td>
       <?php
       if ($r['total_harga']> 0) {
       	# code...
       	?>
       	 <td>Rp. <?= $r['total_harga'] ?></td>
       	 <?php
       } else {
       	?>
       	<td>Rp. 0</td>
       	<?php
       }
       ?>
        <?php   
      }
      ?>
      </tr> 
  <tr>
  	<td colspan=""><h6>Total</h6></td>
  	<td colspan="6"><h6 class="text-end">Rp. <?= $total_pendapatan;?></h6></td>
  </tr>
  
  </tbody>
</table>
	</div>
	<nav>
			<ul class="pagination justify-content-center">
				<li class="page-item">
					<a class="page-link" <?php if($halaman > 1){ echo "href='?halaman=$Previous'"; } ?>>Previous</a>
				</li>
				<?php 
				for($x=1;$x<=$total_halaman;$x++){
					?> 
					<li class="page-item"><a class="page-link" href="?halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
					<?php
				}
				?>				
				<li class="page-item">
					<a  class="page-link" <?php if($halaman < $total_halaman) { echo "href='?halaman=$next'"; } ?>>Next</a>
				</li>
			</ul>
		</nav>
</div>
