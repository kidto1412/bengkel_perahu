<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" type="text/css" href="../../../dist/css/bootstrap.min.css">
</head>
<body>
<?php
  include "../../../koneksi.php"; 
  $nota = $_GET['nota'];
  $query = mysqli_query($koneksi, "SELECT SUM(detail_transaksi.jumlah) as jumlah, transaksi.nota, transaksi.tanggal, pelayanan.nama_pelayanan, pelayanan.jenis_pelayanan, pelayanan.harga_pelayanan,detail_transaksi.keterangan FROM `pelayanan` inner join detail_transaksi INNER JOIN transaksi ON pelayanan.id_pelayanan = detail_transaksi.id_pelayanan AND transaksi.nota = detail_transaksi.nota WHERE transaksi.tanggal = transaksi.tanggal AND pelayanan.id_pelayanan = pelayanan.id_pelayanan AND MONTH(transaksi.tanggal)  AND YEAR(transaksi.tanggal) and transaksi.nota = '$nota' GROUP BY pelayanan.id_pelayanan");
  $data = mysqli_fetch_array($query);
?>

  <div class="container">
      <table class="table mb-5">
       <tr>
      <td><h6>Nota</h6></td>
      <td><h6>:</h6></td>
      <td colspan="6"><h6><?php echo $data['nota'];?></h6></td>
    </tr>
    <tr style="margin-top-bottom: 25px;">
       <td><h6>Tanggal Transaksi</h6></td>
       <td><h6>:</h6></td>
      <td colspan="6"><h6><?php echo $data['tanggal']; ?></h6></td>
    </tr>
  </table>
  <table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Pelayanan</th>
      <th scope="col">Jenis Pelayanan</th>
      <th scope="col">Jumlah</th>
      <th scope="col">Harga</th>
      <th scope="col">Keterangan</th>
       <th scope="col">Subtotal</th>
    </tr>

  </thead>
  <tbody>
    <?php 
    $nota = $_GET['nota'];
    $data = mysqli_query($koneksi, "SELECT SUM(detail_transaksi.jumlah) as jumlah, pelayanan.nama_pelayanan, pelayanan.jenis_pelayanan, pelayanan.harga_pelayanan,detail_transaksi.keterangan FROM `pelayanan` inner join detail_transaksi INNER JOIN transaksi ON pelayanan.id_pelayanan = detail_transaksi.id_pelayanan AND transaksi.nota = detail_transaksi.nota WHERE transaksi.tanggal = transaksi.tanggal AND pelayanan.id_pelayanan = pelayanan.id_pelayanan AND MONTH(transaksi.tanggal) and transaksi.nota = '$nota' GROUP BY pelayanan.id_pelayanan");
    $nomor = 1;
    $total = 0;
    while($d = mysqli_fetch_array($data)){
       $subtotal = $d['harga_pelayanan'] * $d['jumlah'];
       $total = $total + $subtotal;
    ?>
  <tr>
    <td><?php echo $nomor++; ?></td>
    <td><?php echo $d['nama_pelayanan']; ?></td>
    <td><?php echo $d['jenis_pelayanan']; ?></td>
    <td><?php echo $d['jumlah']; ?></td>
    <td><?php echo $d['harga_pelayanan']; ?></td>
    <td><?php echo $d['keterangan']; ?></td>
    <td>Rp. <?php echo $subtotal; ?></td>
  </tr>
    <?php 
        }
      ?>
  <tr>
    <td colspan="6"><h5> Total harga</h5></td>
    <td>
      <div>
         <h6>Rp. <?php echo $total; ?></h6>
      </div>
    </td>
  </tr>
  <tr>

  </tr>
  </tbody>
</table>

  </div>
   <?php 
    $nota = $_GET['nota'];
    $data = mysqli_query($koneksi, "SELECT * FROM detail_transaksi A INNER JOIN transaksi B ON A.nota = B.nota INNER JOIN pelayanan C ON C.id_pelayanan = a.id_pelayanan INNER JOIN user ON user.id_user = b.id_user where a.nota = '$nota'");
   $row = mysqli_fetch_array($data);
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