<?php 
    session_start();
    include '../koneksi/koneksi.php';

    $NISN = $_GET['NISN'];
    $data = $conn->query("SELECT * FROM siswa WHERE NISN = '$NISN'");
	$dta = mysqli_fetch_assoc($data);
    $c=mysqli_num_rows($data);
    if($c > 0){
    header('location: bayar_admin.php?NISN='.$NISN);
    }else{
        echo "<script>alert('Data siswa tidak ditemukan');location.href='transaksi.php';</script>";
    }
?>