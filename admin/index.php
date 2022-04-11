<!DOCTYPE html>
<html>

<head>
    <title>Admin</title>
    <link rel="stylesheet" type="text/css" href="../dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">Bengkel Perahu</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Pelanggan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Pelayanan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Transaksi</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container mt-5">
        <div class="alert alert-secondary" role="alert">
            <li class="breadcrumb-item active" aria-current="page">Admin</li>
        </div>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body bg-primary text-white">
                        <h4>Data Pelayanan</h4>
                        <div class="d-flex">
                            <i class="fa fa-users" aria-hidden="true"></i>
                            <h5 class="mx-2">50</h5>
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
                        <h4>Data Pekerja</h4>
                        <div class="d-flex">
                            <i class="fa fa-users" aria-hidden="true"></i>
                            <h5 class="mx-2">50</h5>
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
                            <h5 class="mx-2">50</h5>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="">Detail</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../dist/js/bootstrap.min.js"></script>
</body>

</html>