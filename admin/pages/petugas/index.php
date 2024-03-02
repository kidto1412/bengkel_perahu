
<div class="alert alert-secondary" role="alert">
    <li class="breadcrumb-item active" aria-current="page">  
       Dashboard / Petugas
    </li>
</div>
<div class="card">
  <div class="card-header">Data Petugas</div>
  <div class="card-body">
     <a href="?menu=tambah_petugas" class="btn btn-primary mb-2">Tambah Petugas</a>
    <form method="POST" action="?menu=data_petugas">
      <div class="d-flex">
        <input type="text" class="form-control me-2" name="nt" placeholder="Cari Nama Pengguna..." name="nt">
        <input type="submit" class="btn btn-info me-2" name="cari" value="Cari">
        <a href="" class="btn btn-secondary">Reset</a>
      </div>
    </form>
    <?php
    $nt = $_POST['nt'];
     if ($_POST['cari']) {
      # code...
      if ($nt == "") {
          $q = mysqli_query($koneksi, "select * from user");
        } else if ($nt!=="") {
          # code...
          $q = mysqli_query($koneksi, "SELECT * from user WHERE nama like '%$nt%'");
        }
    } 

    else {
     // perintah tampil semua data
     $q = mysqli_query($koneksi, "select * from user");
    }
    ?>
   
    <table class="table">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Username</th>
      <th scope="col">Nama Petugas</th>
      <th scope="col">Aksi</th>
    </tr>
    <?php
      require_once 'petugas.php';
      // $petugas = new petugas();
      // $result = $petugas->view();
      $no = 1;
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
    }else{
      // foreach($result as $data){
         while ($data = $q->fetch_assoc()) {
      ?>
      <tr>
        <td><?php echo $no++; ?></td>
        <td><?php echo $data['username']; ?></td>
        <td><?php echo $data['nama']; ?></td>
        <td>
       <a  class="btn btn-danger" onclick="return confirm('anda yakin ingin menghapusnya?')" href="?menu=hapus_petugas&id_user=<?php echo $data['id_user']; ?>" title="Hapus">Hapus</a>
        <a  class="btn btn-warning " title="Edit" href="?menu=edit_petugas&id_user=<?php echo $data['id_user']; ?>"> Edit </a>
        </td>
      </tr>
      <?php 
      }}
      ?>
      </td>
    </tr>
  </tbody>
  </table>
  </div>
</div>