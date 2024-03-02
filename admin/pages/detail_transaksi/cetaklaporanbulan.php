 <!DOCTYPE html>
<html>
<head>
  <title></title>
   <link rel="stylesheet" type="text/css" href="../../../dist/css/bootstrap.min.css">
</head>
<body>
<h3 class="text-center mb-2 ">Data Transaksi</h3>
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
    $bulan = $_GET['bulan'];
    $tahun = $_GET['tahun'];
     include "../../../koneksi.php"; 
      $query = mysqli_query($koneksi, "SELECT SUM(detail_transaksi.jumlah) as jumlah,transaksi.nota, transaksi.tanggal, transaksi.total_harga,pelayanan.nama_pelayanan, pelayanan.jenis_pelayanan, pelayanan.harga_pelayanan,detail_transaksi.keterangan FROM `pelayanan` inner join detail_transaksi INNER JOIN transaksi ON pelayanan.id_pelayanan = detail_transaksi.id_pelayanan AND transaksi.nota = detail_transaksi.nota WHERE transaksi.tanggal = transaksi.tanggal AND pelayanan.id_pelayanan = pelayanan.id_pelayanan AND MONTH(transaksi.tanggal) = '$bulan' and YEAR(transaksi.tanggal) = '$tahun' GROUP BY pelayanan.id_pelayanan ORDER BY transaksi.nota; ");
      $no = 1;
      $total_pendapatan = 0;
      while ($data = mysqli_fetch_array($query)) {
         // $total_pendapatan = $total_pendapatan + $data['total_harga'];
         $subtotal = $data['harga_pelayanan'] * $data['jumlah'];
         $total_pendapatan = $total_pendapatan + $subtotal;
      ?>

      <tr>
       <td><?= $no++ ?></td>
       <td><?= ucwords($data['nota']) ?></td>
       <td><?= $data['nama_pelayanan'] ?></td>
       <td><?= $data['jenis_pelayanan'] ?></td>
       <td><?= $data['jumlah'] ?></td>
       <td><?= date('d-M-Y', strtotime($data['tanggal'])) ?></td>
        <!-- <td><?php echo $data['total_harga']?></td> -->
           <td>Rp. <?= $subtotal; ?></td>
      </tr> 
      <?php   
      }
      ?>
  <tr>
    <td colspan=""><h6>Total</h6></td>
    <td colspan="6"><h6 class="text-end">Rp. <?= $total_pendapatan;?></h6></td>

  </tr>
  
  </tbody>
</table>
<?php 
 $bulan = $_GET['bulan'];
    $tahun = $_GET['tahun'];
    $data2 =  mysqli_query($koneksi, "SELECT * FROM detail_transaksi A INNER JOIN transaksi B ON A.nota = B.nota INNER JOIN pelayanan C ON C.id_pelayanan = a.id_pelayanan INNER JOIN user ON user.id_user = b.id_user WHERE MONTH(tanggal) = '$bulan' AND YEAR(tanggal) = '$tahun' group by b.nota ");
   $row = mysqli_fetch_array($data2);
   ?>
   <div class="text-end">
  <h5 class="">Petugas</h5>
<p class="mt-5"><?php echo $row['nama']; ?></p>
</div>
<script>
  window.print();
</script>
</body>
</html>
