<?php 
	if (isset($_GET['bulan'])) {
		$bulan = date($_GET['bulan']);
		if (!empty($bulan)) {
		  // perintah tampil data berdasarkan periode bulan
		  $q = mysqli_query($koneksi, "SELECT * FROM transaksi WHERE MONTH(tanggal) = '$bulan'");
		   echo '<a href="pages/detail_transaksi/cetaklaporanbulan.php?bulan='.$_GET['bulan'].'" class="btn btn-secondary mt-3">Cetak</a>';

		 }
		  else {
		  // perintah tampil semua data
		  $q = mysqli_query($koneksi, "SELECT * FROM transaksi t");
		   echo '<a href="?menu=cetaktransaksi" class="btn btn-secondary mt-3">Cetak</a>';
		 }
		} else {
		 // perintah tampil semua data
		 $q = mysqli_query($koneksi, "SELECT * FROM transaksi");
		   echo '<a href="?menu=cetaktransaksi" class="btn btn-secondary mt-3">Cetak</a>';
		}

		// hitung jumlah baris data
		$s = $q->num_rows;

?>