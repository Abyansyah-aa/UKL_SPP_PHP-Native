<?php
if($_GET['NISN']){
    include "../koneksi/koneksi.php";
    $qry_hapus=mysqli_query($conn,"delete from siswa where NISN='".$_GET['NISN']."'");
if($qry_hapus){
    echo "<script>alert('Sukses hapus siswa');location.href='siswa.php';</script>";
} else {
    echo "<script>alert('Gagal hapus siswa');location.href='siswa.php';</script>";
}
}
?>