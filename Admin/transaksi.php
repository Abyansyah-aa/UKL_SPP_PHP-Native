<?php include '../koneksi/koneksi.php'; 
session_start();
if ($_SESSION['status_login']==false) {
  header('location:../Login/index.php');
}elseif ($_SESSION['level']!='admin') {
    header('location:../Login/index.php');
}else{
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin SPP</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.css">

    <link rel="stylesheet" href="assets/vendors/simple-datatables/style.css">

    <link rel="stylesheet" href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css">

    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon">
</head>

<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo">
                            <a href="index.php"><img src="assets/images/logo/logo.png" alt="Logo" srcset=""></a>
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">Menu</li>

                        <li class="sidebar-item  ">
                            <a href="index.php" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                    

                        <li class="sidebar-title">CRUD Data</li>

                        <li class="sidebar-item">
                            <a href="kelas.php" class='sidebar-link'>
                                <i class="bi bi-pen-fill"></i>
                                <span>Data Kelas</span>
                            </a>
                        </li>

                        <li class="sidebar-item  ">
                            <a href="siswa.php" class='sidebar-link'>
                                <i class="bi bi-pen-fill"></i>
                                <span>Data Siswa</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a href="petugas.php" class='sidebar-link'>
                                <i class="bi bi-pen-fill"></i>
                                <span>Data Petugas</span>
                            </a>
                        </li>

                        <li class="sidebar-item ">
                            <a href="spp.php" class='sidebar-link'>
                                <i class="bi bi-pen-fill"></i>
                                <span>Data SPP</span>
                            </a>
                        </li>

                        <li class="sidebar-title">Transaksi</li>

                        <li class="sidebar-item active">
                            <a href="transaksi.php" class='sidebar-link'>
                                <i class="bi bi-cash"></i>
                                <span>Pembayaran</span>
                            </a>
                        </li>
                        <li class="sidebar-title">Keluar</li>

                        <li class="sidebar-item  ">
                            <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModalCenter" class='sidebar-link'>
                                <i class="bi bi-box-arrow-left"></i>
                                <span>logout</span>
                            </a>
                        </li>

                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>

       <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>Data SPP</h3>
                            <p class="text-subtitle text-muted">Berisi data spp</p>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Data SPP</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <section class="section">
                    <div class="card">
                        <div class="card-header">
                        
                        </div>
                        
                        <div class="card-body ">
                            <div class="col-md-6 mb-1 m-auto">
                            <form action="search.php" method="get">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1"><i
                                            class="bi bi-search"></i></span>
                                            <input type="text" class="form-control" placeholder="Cari siswa (NISN)" name="NISN">
                                    <button class="btn btn-outline-secondary" type="submit"
                                        id="button-addon2">Search</button>     
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    
                </section>
            </div>

            <!-- <footer>
                <div class="footer clearfix mb-0  text-muted">
                    <div class="float-start">
                        <p>2021 &copy; Mazer</p>
                    </div>
                    <div class="float-end">
                        <p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a
                                href="http://ahmadsaugi.com">A. Saugi</a></p>
                    </div>
                </div>
            </footer> -->
        </div>
    </div>


    <script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <!-- Modal -->
     <div class="modal fade text-left" id="inlineForm" tabindex="-1"
                role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
                 <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                    role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel33">Tambah SPP</h4>
                            <button type="button" class="close" data-bs-dismiss="modal"
                                aria-label="Close">
                                <i data-feather="x"></i>
                                </button>
                            </div>
                        <form action="proses_tambah_spp.php" method="post">
                            <div class="modal-body">
                                <label>Angkatan</label>
                                <div class="form-group">
                                    <select name="angkatan" id="" class="form-control">
                                        <option value=""></option>
                                    <?php 
                                    include "../koneksi/koneksi.php";
                                    $qry_kelas=mysqli_query($conn,"select * from kelas");
                                    while($data_kelas=mysqli_fetch_array($qry_kelas)){
                                        echo '<option value="'.$data_kelas['angkatan'].'">'.$data_kelas['angkatan'].'</option>';    
                                    }
                                    ?> 
                                    </select>
                                </div>
                                <label>Tahun</label>
                                <div class="form-group">
                                    <input type="text" name="tahun" placeholder="Tahun"
                                    class="form-control">
                                </div>
                                <label>Nominal</label>
                                <div class="form-group">
                                    <input type="text" name="nominal" placeholder="Nominal"
                                    class="form-control">
                                </div>                                
                            </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light-secondary"
                                data-bs-dismiss="modal">
                                <i class="bx bx-x d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Close</span>
                            </button>
                            <input type="submit" name="simpan" value="Tambah" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <!-- End Modal -->

    <!-- Modal Ubah -->
                    
    
    <!-- End Modal Ubah -->
    

    <script src="assets/vendors/simple-datatables/simple-datatables.js"></script>
    <script>
        // Simple Datatable
        let table1 = document.querySelector('#table1');
        let dataTable = new simpleDatatables.DataTable(table1);
    </script>

<!-- Logout Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
            role="document">
            <div class="modal-content">
                 <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Ready to leave?
                    </h5>
                    <button type="button" class="close" data-bs-dismiss="modal"
                        aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary"
                        data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Close</span>
                     </button>
                                                        
                        <a href="../Login/logout.php" class="btn btn-primary"
                    style="color: #fff;" >Logout</a>
                                                        
                </div>
            </div>
        </div>
    </div>
    <!-- end logout modal -->

    <script src="assets/js/main.js"></script>
</body>

</html>
<?php
}
?>