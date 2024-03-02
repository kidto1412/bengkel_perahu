<?php 
if (isset($_POST['tambah'])) {
	# code...
	
	$nota = $_POST['nota'];
	$tanggal = date('Y-m-d');
	$id_user =  $_SESSION['id_user'];
		// $kd_perahu = $_POST['kd_perahu'];
	mysqli_query($koneksi,"insert into transaksi values('$nota','$tanggal','','$id_user')");
 	?>
 	<script type="text/javascript">
		alert('berhasil disimpan');
		document.location.href="?menu=transaksi";
	</script>
	<?php
}
 
?>