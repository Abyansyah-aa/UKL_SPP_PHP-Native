<?php include '../koneksi/koneksi.php'; 
session_start();
if ($_SESSION['status_login']==false) {
  header('location:../Login/index.php');
}elseif ($_SESSION['level']!='petugas') {
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
    <?php 
        $sql = 'select * from siswa  join kelas  on siswa.id_kelas=kelas.id_kelas where NISN =' .$_GET['NISN'];
        $result = mysqli_query($conn, $sql);
        $data=mysqli_fetch_array($result);    
    ?>

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
                                            <input type="text" class="form-control" placeholder="Cari siswa (NISN)" name="nisn">
                                    <button class="btn btn-outline-secondary" type="submit"
                                        id="button-addon2">Search</button>     
                                </div>
                                </form>
                            </div>
                            <!-- Profile -->
                            
                            <section style="background-color: #eee;">
                                <div class="container py-5">
                                <div class="row">
                                <div class="col-lg-4 m-auto">
                                    <div class="card mb-4">
                                    <div class="card-body text-center">
                                        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp" alt="avatar"
                                        class="rounded-circle img-fluid" style="width: 150px;">
                                        <h5 class="my-3"><?= $data['nama']?></h5>
                                        <p class="text-muted mb-1">Full Stack Developer</p>
                                        <p class="text-muted mb-4">Bay Area, San Francisco, CA</p>
                                        <div class="d-flex justify-content-center mb-2">
                                        </div>
                                    </div>
                                    </div>
                                    <div class="card mb-4 mb-lg-0">
                                
                                    </div>
                                </div>
                                <div class="mb-4 mb-lg-8">
                                    <div class="card mb-4">
                                    <div class="card-body">
                                        <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">NISN</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0"><?= $data['NISN']?></p>
                                        </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">NIS</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0"><?= $data['NIS']?></p>
                                        </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Nama</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0"><?= $data['nama']?></p>
                                        </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Alamat</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0"><?= $data['alamat']?></p>
                                        </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Kelas</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0" value="<?= $data['nama_kelas']?>"><?= $data['nama_kelas']?></p>
                                        </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Nomor Telephone</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0"><?= $data['no_tlp']?></p>
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                    </div>

                                </div>
                                </div>
                            </div>
                            <div class="card-body">
                        
                            <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>Bulan</th>
                                        <th>Tahun</th>
                                        <th>Nominal</th>
                                        <th>Jatuh Tempo</th>
                                        <th>keterangan</th>
                                        <th>Tanggal Lunas</th>
                                        <th>Aksi</th>

                                        

                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                    $date = date('Y-m-d');
                                    $qry_pembayaran= mysqli_query($conn ,"select * from pembayaran WHERE NISN = '$data[NISN]'  ORDER BY jatuh_tempo ASC ");
                                    $sql=mysqli_query($conn, "select * from spp join pembayaran on pembayaran.id_spp=spp.id_spp ");
                                    $i=1;
                                    $total=0;

                                    while($data=mysqli_fetch_array($sql)){
                                    $nom=$data['nominal'];
                                    }
                                    while($data_pembayaran=mysqli_fetch_array($qry_pembayaran)){
                               ?>
                                        <tr>
                                            <td><?= $i?></td>
                                            <td><?= $data_pembayaran['bulan_spp']; ?></td>
                                            <td><?= $data_pembayaran['tahun_spp']; ?></td> 
                                            <td><?= $nom ?></td>
                                            <td><?= $data_pembayaran['jatuh_tempo']; ?></td>
                                            <td>
                                            <?php
                                            $ket = 'lunas';
                                            if ($data_pembayaran['keterangan'] === $ket){
                                                echo "</a>";
                                                echo "<span class='px-4'>Lunas</span>";
                                            }else {
                                                echo "</a>";
                                                echo "<span class='px-2'>Belum Lunas</span>";
                                                
                                            } echo "
                                            </td>
                                            <td>$data_pembayaran[tgl_bayar]</td>
                                  <td align='center'";
                                  $keterangan = 'lunas' ;
                                  if ($data_pembayaran['keterangan'] === $keterangan){
                                      echo "</a>";
                                      echo "<a class=' px-2 disabled'style='margin-right:5px'>Lunas<a>";
                                  }else {
                                      echo "</a>";
                                      echo "<a class='px-2' href='proses_pembayaran.php?id_pembayaran=$data_pembayaran[id_pembayaran]&NISN=$data_pembayaran[NISN]'>Bayar</a> ";   
                                  }
			                            echo "</td>
                                        </tr>
                                        ";
                                        $i++;
                                   $total += $nom;                                   
                           }
                           ?>    
                                            </div>
                                        </div>
                                    </div>
                                        
                                </tbody>
                                
                            </table>
                        </div>
                            </section>
                            <!-- Table -->
                            
                        </div>
                    </div>
                    
                </section>
                
            </div>
            
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