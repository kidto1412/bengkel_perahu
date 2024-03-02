<div class="alert alert-secondary" role="alert">
    <li class="breadcrumb-item active" aria-current="page">  
       Dashboard
    </li>
</div>
<div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body bg-primary text-white">
                        <h4>Data Petugas</h4>
                        <div class="d-flex">
                            <i class="fa fa-users" aria-hidden="true"></i>
                            <?php
                                    $query = mysqli_query($koneksi,"SELECT * FROM user");
                                    $jumlah = mysqli_num_rows($query);
                                ?>
                            <h5 class="mx-2">
                                <?php echo $jumlah; ?>
                            </h5>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="">Detail</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body bg-warning text-white">
                        <h4>Data Pelayanan</h4>
                        <div class="d-flex">
                            <i class="fa fa-users" aria-hidden="true"></i>
                              <?php
                                    $query = mysqli_query($koneksi,"SELECT * FROM pelayanan");
                                    $jumlah = mysqli_num_rows($query);
                                ?>
                                 <h5 class="mx-2"> <?php echo $jumlah; ?></h5>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="">Detail</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body bg-danger text-white">
                        <h4>Data Transaksi</h4>
                        <div class="d-flex">
                            <i class="fa fa-users" aria-hidden="true"></i>
                             <?php
                                    $query = mysqli_query($koneksi,"SELECT * FROM pelayanan");
                                    $jumlah = mysqli_num_rows($query);
                                ?>
                             <h5 class="mx-2"> <?php echo $jumlah; ?></h5>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="">Detail</a>
                    </div>
                </div>
            </div>
        </div>
    </div>