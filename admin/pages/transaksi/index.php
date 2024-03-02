<div class="alert alert-secondary" role="alert">
    <li class="breadcrumb-item active" aria-current="page">  
       Dashboard/Transaksi
    </li>
</div>
<div class="card">
	<div class="card-header">Transaksi</div>
	<div class="card-body">
		<form method="POST" action="?menu=tambah_transaksi">
		<div class="mb-3">
		    <label class="form-label">Nota</label>
		    <?php
				$query = mysqli_query($koneksi, "SELECT max(nota) as notaTerbesar FROM transaksi");
				$data = mysqli_fetch_array($query);
				$noTransaksi = $data['notaTerbesar'];
				$urutan = (int) substr($noTransaksi, 3, 3);
				$urutan++;	
				$huruf = "NT";
				$nota = $huruf . sprintf("%03s", $urutan);
				
			?>
		      <input type="text" name="nota" class="form-control" value="<?php  echo $nota ?>" readonly>
		  </div>
		   <div class="mb-3">
		    <label class="form-label">Tanggal</label>
		    <input type="text" readonly  name="tanggal" class="form-control" value="<?php echo date("m/d/Y") ?>"> 
		  </div>
		   <div>
		   	<input type="submit" name="tambah" class="btn btn-primary" value="Tambah">
		
			<a href="" class="btn btn-danger">Cancel</a>
		   </div>
		</form>
	</div>
</div>
<div class="card mt-5 mb-5">
	<div class="card-header">Data Transaksi</div>
	<div class="card-body">
      <form method="POST" action="?menu=transaksi">
      <div class="d-flex">
        <input type="text" class="form-control me-2" name="nt" placeholder="Cari Nota..." name="nt">
        <input type="submit" class="btn btn-info me-2" name="cari" value="Cari">
        <a href="" class="btn btn-secondary">Reset</a>
      </div>
    </form>
     <?php
    $nt = $_POST['nt'];
     if ($_POST['cari']) {
      # code...
      if ($nt == "") {
          $q = mysqli_query($koneksi, "select * from transaksi");
        } else if ($nt!=="") {
          # code...
          $q = mysqli_query($koneksi, "SELECT * from transaksi WHERE nota like '%$nt%'");
        }
    } 

    else {
     // perintah tampil semua data
     $q = mysqli_query($koneksi, "select * from transaksi order by nota desc");
    }
    ?>
  <table class="table">
  <thead>
  	 
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nota</th>
      <th scope="col">Tanggal</th>
      <th scope="col">Total Harga</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
  	<?php 
  	
    $data = mysqli_query($koneksi, "SELECT * From transaksi");
    // SELECT t.nota, t.tanggal, p.merk, a.nama FROM transaksi t INNER JOIN perahu p ON p.kd_perahu = t.kd_perahu INNER JOIN admin a ON a.id_admin = t.id_admin;
    $nomor = 1;
    $total = 0;
     function rupiah($angka){
      
      $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
      return $hasil_rupiah;
     
    }
    $cek = mysqli_num_rows($q);
      if($cek <1 ){
      ?>
      <tr>
        <td colspan="8" class="ukuran-huruf1">
          data yang anda cari tidak tersedia
          <a href="" class="btn btn-success utilities"><i class="fa fa-refresh"></i> Refresh</a>
         </td>
      </tr>
      <?php
    } else {
    while($d = $q->fetch_assoc()){
    ?>
    <tr>
    	<td><?php echo $nomor++; ?></td>
    	<td><?php echo $d['nota']; ?></td>
    	<td><?php echo $d['tanggal']; ?></td>
    	<?php
    	if ($d['total_harga'] > 0) {
    		# code...
    		?>
    		<td><?php echo rupiah($d['total_harga']); ?></td>
    		<?php
    	} else {
    		?>
    		<td>Rp.<?php echo $total; ?></td>
    		<?php
    	}
      if ($_SESSION['role'] == 'admin') {
      
    	?>
    	<td>
        <a class="btn btn-primary" href="?menu=bayar&nota=<?php echo $d['nota']; ?>"> Service </a>
       <a class="btn btn-warning" href="?menu=detail&nota=<?php echo $d['nota']; ?>"> Detail </a>
     <!--   <a class="btn btn-info" href="?menu=edit_transaksi&nota=<?php echo $d['nota']; ?>"> Edit </a> -->
      <a class="btn btn-danger" href="?menu=hapus_transaksi&nota=<?php echo $d['nota']; ?>"> Delete </a>
      </td>
    	 <?php 
      } else {
        ?>
        <td>
        <a class="btn btn-primary" href="?menu=bayar&nota=<?php echo $d['nota']; ?>"> Service </a>
       <a class="btn btn-warning" href="?menu=detail&nota=<?php echo $d['nota']; ?>"> Detail </a>
       <!-- <a class="disabled btn btn-dark" href="?menu=edit_transaksi&nota=<?php echo $d['nota']; ?>"> Edit </a> -->
      <a class="disabled btn btn-light" href="?menu=hapus_transaksi&nota=<?php echo $d['nota']; ?>"> Delete </a>
      </td>
      <?php 
      }
      }}
      ?>
    </tr>
  </tbody>
</table>

    </div>
  </div>
</div>
	</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script type="text/javascript">
   <?php   
	  echo $a;   
	  echo $b; ?>  
	  function changeValue(id){  
	    document.getElementById('harga').value = merek[id].merek;  
	  };  
</script>