<?php
if($_GET['id_kelas']){
    include "../koneksi/koneksi.php";
    $qry_hapus=mysqli_query($conn,"delete from kelas where id_kelas='".$_GET['id_kelas']."'");
if($qry_hapus){
    echo "<script>alert('Sukses hapus siswa');location.href='siswa.php';</script>";
} else {
    echo "<script>alert('Gagal hapus siswa');location.href='siswa.php';</script>";
}
}
?>