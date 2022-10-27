<?php
if($_GET['id_spp']){
    include "../koneksi/koneksi.php";
    $qry_hapus=mysqli_query($conn,"delete from spp where id_spp='".$_GET['id_spp']."'");
if($qry_hapus){
    echo "<script>alert('Sukses hapus siswa');location.href='spp.php';</script>";
} else {
    echo "<script>alert('Gagal hapus siswa');location.href='spp.php';</script>";
}
}
?>