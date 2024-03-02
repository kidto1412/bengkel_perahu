<?php 
if (isset($_POST['tambah'])) {
	# code...
	
	$nota = $_POST['nota'];
	$tanggal = date('Y-m-d');
	$id_user =  $_SESSION['id_user'];
		// $kd_perahu = $_POST['kd_perahu'];
	$insert = 
	mysqli_query($koneksi,"insert into transaksi values('$nota','$tanggal','','$id_user')");
	$query = mysqli_query($koneksi, "select * from transaksi where nota='$nota'");
			$data = mysqli_fetch_array($query);
 	?>
 	
 	<script type="text/javascript">
		alert('berhasil disimpan');
		document.location.href="?menu=bayar&nota=<?php echo $data['nota']; ?>";
	</script>
	<?php
}
 
?>