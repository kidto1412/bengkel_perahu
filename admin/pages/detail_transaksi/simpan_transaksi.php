<?php 
if (isset($_POST['simpan_transaksi'])) {
	# code...
	$nota = $_POST['nota'];
	$total_harga = $_POST['total_harga'];
	mysqli_query($koneksi,"update transaksi set total_harga = '$total_harga' where nota = '$nota'");

 	?>
 	<script type="text/javascript">
		alert('berhasil disimpan');
		document.location.href="?menu=transaksi";
	</script>
	<?php
}
?>