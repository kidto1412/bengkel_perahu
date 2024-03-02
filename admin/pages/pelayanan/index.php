
<div class="alert alert-secondary" role="alert">
    <li class="breadcrumb-item active" aria-current="page">  
       Dashboard / Pelayanan
    </li>
</div>
<div class="card">
  <div class="card-header">Data Pelayanan</div>
  <div class="card-body">
    <?php 
     if ($_SESSION['role']=='admin') {
       # code...
      ?>
     <a href="?menu=tambah_pelayanan" class="btn btn-primary mb-2 mt-2">Tambah Pelayanan</a>
      <?php
     } else {
      ?>
      <a href="?menu=tambah_pelayanan" class="disabled btn btn-light mb-2">Tambah Petugas</a>
      <?php
     }
     ?>
  
    <form method="POST" action="?menu=data_pelayanan">
      <div class="d-flex">
        <input type="text" class="form-control me-2" name="nt" placeholder="Cari Nama Pelayanan..." name="nt">
        <input type="submit" class="btn btn-info me-2" name="cari" value="Cari">
        <a href="" class="btn btn-secondary">Reset</a>
        
      </div>
    </form>
    <?php
    $nt = $_POST['nt'];
     if ($_POST['cari']) {
      # code...
      if ($nt == "") {
          $q = mysqli_query($koneksi, "select * from pelayanan");
        } else if ($nt!=="") {
          # code...
          $q = mysqli_query($koneksi, "SELECT * from pelayanan WHERE nama_pelayanan like '%$nt%'");
        }
    } 

    else {
     // perintah tampil semua data
     $q = mysqli_query($koneksi, "select * from pelayanan");
    }
    ?>
   
    <table class="table">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama Pelayanan</th>
      <th scope="col">Jenis Pelayanan</th>
      <th scope="col">Harga</th>
      <th scope="col">Aksi</th>
    </tr>
    <?php 
    $batas = 10;
     function rupiah($angka){
      
      $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
      return $hasil_rupiah;
     
    }
    // $halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
    // $halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;  
    // $previous = $halaman - 1;
    // $next = $halaman + 1;
    $data = mysqli_query($koneksi, "SELECT * FROM pelayanan");
    // $jumlah_data = mysqli_num_rows($data);
    // $total_halaman = ceil($jumlah_data / $batas);
    // $data_pelayanan = mysqli_query($koneksi,"select * from pelayanan limit $halaman_awal, $batas");
    // $nomor = $halaman_awal+1;
    $nomor = 1;
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
    while ($d = $q->fetch_assoc()){
    ?>
  </thead>
  <tbody>

    <tr>
      <th><?php echo $nomor++; ?></th>
      <td><?php echo $d['nama_pelayanan']; ?></td>
      <td><?php echo $d['jenis_pelayanan']; ?></td>
      <td><?php echo rupiah($d['harga_pelayanan']); ?></td>
      <td>
       <?php
       if ($_SESSION['role']== 'admin') {
         # code...
        ?>
         <a  class="btn btn-danger" onclick="return confirm('anda yakin ingin menghapusnya?')" href="?menu=hapus_pelayanan&id_pelayanan=<?php echo $d['id_pelayanan']; ?>" title="Hapus">Hapus</a>
        <a  class="btn btn-warning " title="Edit" href="?menu=edit_pelayanan&id_pelayanan=<?php echo $d['id_pelayanan']; ?>"> Edit </a>
        <?php
       } else {
        ?>
         <a  class="btn btn-light disabled" onclick="return confirm('anda yakin ingin menghapusnya?')" href="?menu=hapus_pelayanan&id_pelayanan=<?php echo $d['id_pelayanan']; ?>" title="Hapus">Hapus</a>
        <a  class="btn btn-light disabled" title="Edit" href="?menu=edit_pelayanan&id_pelayanan=<?php echo $d['id_pelayanan']; ?>"> Edit </a>
        <?php
       }
       ?>
        <!-- <a  class="btn btn-warning " title="Edit" href="?menu=edit_perahu&kd_perahu=<?php echo $d['kd_perahu']; ?>"> Edit </a> -->
      <?php 
        }}
      ?>
      </td>
    </tr>
  </tbody>
  </table>
  </div>
</div>
