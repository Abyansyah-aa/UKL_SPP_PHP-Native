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

    <link rel="stylesheet" href="assets/vendors/iconly/bold.css">

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

                        <li class="sidebar-item active ">
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

                        <li class="sidebar-item  ">
                            <a href="petugas.php" class='sidebar-link'>
                                <i class="bi bi-pen-fill"></i>
                                <span>Data Petugas</span>
                            </a>
                        </li>
                        <li class="sidebar-item  ">
                            <a href="spp.php" class='sidebar-link'>
                                <i class="bi bi-pen-fill"></i>
                                <span>Data SPP</span>
                            </a>
                        </li>

                        <li class="sidebar-title">Transaksi</li>

                        <li class="sidebar-item  ">
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
                <h3>Profile Statistics</h3>
            </div>
            <div class="page-content">
                <section class="row">
                    <div class="col-12 col-lg-9">
                        <div class="row">
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon purple">
                                                    <i class="iconly-boldCalendar"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">Tanggal</h6>
                                                <h6 class="font-extrabold mb-0"><?php
                                                $tgl=date('d-m-Y');
                                                echo $tgl;
                                                ?></h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon blue">
                                                    <i class="iconly-boldProfile"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">Jumlah siswa</h6>
                                                <?php 
                                               
                                                $qry_get_buku=mysqli_query($conn,"select count(nama) as SubTotal from siswa ");
                                                $b=mysqli_fetch_assoc($qry_get_buku);   
                                                ?>
                                                <h6 class="font-extrabold mb-0"><?php echo $b['SubTotal']?> </h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon green">
                                                    <i class="iconly-boldProfile"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">Following</h6>
                                                <h6 class="font-extrabold mb-0">80.000</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon red">
                                                    <i class="iconly-boldBookmark"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">Saved Post</h6>
                                                <h6 class="font-extrabold mb-0">112</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-3">
                        <div class="card">
                            <div class="card-body py-4 px-5">
                                <div class="d-flex align-items-center">
                                    <div class="avatar avatar-xl">
                                        <img src="assets/images/faces/1.jpg" alt="Face 1">
                                    </div>
                                    <div class="ms-3 name">
                                        <h5 class="font-bold"><?=$_SESSION['nama_petugas']?></h5>
                                        <h6 class="text-muted mb-0"><?=$_SESSION['level']?></h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4>Nama Petugas</h4>
                            </div>
                            <div class="card-content pb-4">
                            <?php 
			                        $data = mysqli_query($conn,"select * from petugas where level='petugas' ");
                                    
			                        while($d = mysqli_fetch_array($data)){
                                    
				                    ?>
                                <div class="recent-message d-flex px-4 py-3">
                                    <div class="avatar avatar-lg">
                                        <img src="assets/images/faces/4.jpg">
                                    </div>
                                    <div class="name ms-4">
                                        <h5 class="mb-1"><?= $d['nama_petugas']?></h5>
                                        <h6 class="text-muted mb-0"><?= $d['level']?></h6>
                                    </div>  
                                </div>
                                <?php
                                    }
                                ?>
                                <div class="px-4">
                                    <button class='btn btn-block btn-xl btn-light-primary font-bold mt-3'>Start
                                        Conversation</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

            
        </div>
    </div>
    <script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <script src="assets/vendors/apexcharts/apexcharts.js"></script>
    <script src="assets/js/pages/dashboard.js"></script>

    <script src="assets/js/main.js"></script>

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
</body>

</html>
<?php
}
?>