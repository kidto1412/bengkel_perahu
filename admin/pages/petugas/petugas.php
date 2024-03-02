<?php 
 
class petugas{
 
	function view() {
        // memanggil file database.php
        include "database.php";

        // membuat objek db dengan nama $db
        $db = new database();

        // membuka koneksi ke database
        $mysqli = $db->connect();

        // sql statement untuk mengambil semua data siswa
        $sql = "SELECT * FROM user";

        $result = $mysqli->query($sql);

        while ($data = $result->fetch_assoc()) {
            $hasil[] = $data;
        }

        // menutup koneksi database
        $mysqli->close();

        // nilai kembalian dalam bentuk array
        return $hasil;
    }
     function insert($nama, $username, $password, $role) {
        // memanggil file database.php
        require_once "database.php";

        // membuat objek db dengan nama $db
        $db = new database();

        // membuka koneksi ke database
        $mysqli = $db->connect();

        // $id_user          = $mysqli->real_escape_string($id_user);
        $nama         = $mysqli->real_escape_string($nama);
        $username = $mysqli->real_escape_string($username);
        $password       = $mysqli->real_escape_string($password);
        $role       = $mysqli->real_escape_string($role);

        // sql statement untuk insert data siswa
        $sql = "INSERT INTO user (nama,username,password,role) VALUES ('$nama','$username','$password','$role')";
        // $sql = "insert into user values('','$nama','$username','$password','$role'";
        $result = $mysqli->query($sql);

        // cek hasil query
        if($result){
            /* jika data berhasil disimpan alihkan ke halaman siswa dan tampilkan pesan = 2 */
            ?>
            <script type="text/javascript">
        alert('berhasil disimpan');
        document.location.href="?menu=data_petugas";
        </script>
        <?php
        }
        else{
            /* jika data gagal disimpan alihkan ke halaman siswa dan tampilkan pesan = 1 */
          echo "gagal";
        }

        // menutup koneksi database
        $mysqli->close();
    }

 
} 
 
?>