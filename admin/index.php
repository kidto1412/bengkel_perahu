<!DOCTYPE html>
<html>

<head>
    <title>Bengkel Perahu</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="../dist/css/bootstrap.min.css">
    <!-- icon -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <!-- style 2 -->
      <link rel="stylesheet" type="text/css" href="../dist/css/select2.min.css">
      <link rel="stylesheet" type="text/css" href="../dist/css/select2.css">
      <!-- plguin jquery -->
      <script src="../plugin/jquery.min.js"></script>

</head>

<body>
    <?php
    include '../koneksi.php'; 
	 session_start();
	 if($_SESSION['status']!="login"){
		header("location:../index.php?pesan=belum_login");
	}

	?>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <?php
            @$menu = $_GET['menu'];
         ?>
        <div class="container">
            <a class="navbar-brand" href="#"><img src="../dist/logo_kpp.png" width="50"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
              <?php
               include '../koneksi.php'; 
               $data = mysqli_query($koneksi,"select * from user");  
              $row = mysqli_fetch_array($data);
              if ($_SESSION['role'] == 'admin') {
                # code...
                ?>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?menu=data_petugas">Petugas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?menu=data_pelayanan">Pelayanan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?menu=transaksi">Transaksi</a>
                    </li>
                     <li class="nav-item">
                        <a class="nav-link" href="?menu=laporan">Laporan</a>
                    </li>
                </ul>
                 <li class="nav-item dropdown" style="list-style: none;">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <?php echo $_SESSION['username']; ?>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                        <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                    </ul>
                </li>
                <?php
              } else if($_SESSION['role']=='petugas'){  
                ?>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?menu=data_pelayanan">Pelayanan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?menu=transaksi">Transaksi</a>
                    </li>
                     <li class="nav-item">
                        <a class="nav-link" href="?menu=laporan">Laporan</a>
                    </li>
                </ul>
                <li class="nav-item dropdown" style="list-style: none;">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <?php echo $_SESSION['username']; ?>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                        <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                    </ul>
                </li>
                <?php
              }
              ?>
               
                
            </div>
        </div>
    </nav>
    <div class="container mt-5">
        
        <?php
         error_reporting(0);
		 switch ($_GET['menu']) {
		 // case 'data_perahu':
		 // 	include "pages/perahu/index.php";
	  //    break;
   //       case 'tambah_perahu':
   //          include "pages/perahu/tambah.php";
   //       break;
   //       case 'edit_perahu':
   //          include "pages/perahu/edit.php";
   //       break;
   //       case 'hapus_perahu': $kd=$_GET['kd_perahu']; mysqli_query($koneksi, "delete from perahu where kd_perahu='$kd'");

 //           <script type="text/javascript"> -->
 //             alert('berhasil dihapus'); -->
 //             document.location.href="?menu=data_perahu"; -->
  //           </script> -->
             
   //              include "pages/perahu/index.php";
   //      break;
        case 'data_petugas':
        include "pages/petugas/index.php";
         break;
         case 'tambah_petugas':
            include "pages/petugas/tambah.php";
         break;
         case 'edit_petugas':
            include "pages/petugas/edit.php";
         break;
         case 'hapus_petugas': $id_user=$_GET['id_user']; mysqli_query($koneksi, "delete from user where id_user='$id_user'");
                     ?>
             <script type="text/javascript">
               alert('berhasil dihapus');
               document.location.href="?menu=data_petugas";
             </script>
             <?php
              include "pages/petugas/index.php";
              break;
        case 'data_pelayanan':
            include "pages/pelayanan/index.php";
         break;
         case 'tambah_pelayanan':
            include "pages/pelayanan/tambah.php";
         break;
         case 'edit_pelayanan':
            include "pages/pelayanan/edit.php";
         break;
         case 'hapus_pelayanan': $id=$_GET['id_pelayanan']; mysqli_query($koneksi, "delete from pelayanan where id_pelayanan='$id'");
                     ?>
             <script type="text/javascript">
               alert('berhasil dihapus');
               document.location.href="?menu=data_pelayanan";
             </script>
             <?php
              include "pages/pelayanan/index.php";
              break;
         case 'transaksi':
            include "pages/transaksi/index.php";
         break;
         case 'tambah_transaksi':
            include "pages/transaksi/proses_tambah.php";
         break;
          case 'edit_transaksi':
            include "pages/transaksi/edit.php";
         break;
        case 'bayar':
            include "pages/detail_transaksi/index.php";
         break;
         case 'detail':
            include "pages/detail_transaksi/detail.php";
         break;
          case 'edit_detail':
            include "pages/detail_transaksi/edit.php";
         break;
          case 'simpan_transaksi':
            include "pages/detail_transaksi/simpan_transaksi.php";
         break;
           case 'hapus_transaksi': $nota=$_GET['nota']; mysqli_query($koneksi, "delete from transaksi where nota='$nota'");
                     ?>
             <script type="text/javascript">
               alert('berhasil dihapus');
               document.location.href="?menu=transaksi";
             </script>
        <?php
         break;
          case 'delete_detail': $nota=$_GET['nota']; $id_pelayanan = $_GET['id_pelayanan']; mysqli_query($koneksi, "delete from detail_transaksi where nota='$nota' and id_pelayanan = '$id_pelayanan' ");
                     ?>
             <script type="text/javascript">
               alert('berhasil dihapus');
               <?php
                $nota = $_GET['nota'];
                $query = mysqli_query($koneksi, "select * from transaksi where nota='$nota'");
                $data = mysqli_fetch_array($query);
                ?>
              document.location.href="?menu=bayar&nota=<?php echo $data['nota']; ?>";
             </script>
        <?php
         case 'laporan':
            include "pages/detail_transaksi/laporan.php";
         break;
          case 'cetakdetail':
            include "pages/detail_transaksi/detailcetak.php";
         break;
         case 'cetaktransaksi':
            include "pages/detail_transaksi/cetaktransaksi.php";
         break;
          case 'laporanperbulan':
            include "pages/detail_transaksi/cetaklaporanbulan.php";
         break;
          case 'filter':
            include "pages/detail_transaksi/filter.php";
         break;
		 default:
		    include "dashboard.php";
		  	break;
		  }
		?>
    </div>
    <script src="../dist/js/bootstrap.min.js"></script>
    <script src="../dist/js/select2.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function() {
          $('.js-example-basic-single').select2();
      });
    </script>
     </div>

</script>
</body>

</html>