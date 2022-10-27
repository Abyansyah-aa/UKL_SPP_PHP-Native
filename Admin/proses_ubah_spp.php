<?php
    if($_POST){
        $id_spp=$_POST['id_spp'];
        $angkatan=$_POST['angkatan'];
        $tahun=$_POST['tahun'];
        $nominal=$_POST['nominal'];
        
        include "../koneksi/koneksi.php";
        $cek = mysqli_num_rows(mysqli_query($conn, "select * from spp where angkatan='$angkatan'"));

        if (empty($_POST['angkatan'])) {
            if ($cek > 0) {
                echo "<script>window.alert('angkatan yang anda yang anda masukan sudah ada')
            window.location='spp.php'</script>";
            } else {
                $update=mysqli_query($conn,"update spp set tahun='".$tahun."',nominal='".$nominal."' where id_spp= '".$id_spp."'") or die(mysqli_error($conn));
                if($update){
                    echo "<script>alert('Sukses update kelas');location.href='spp.php';</script>";
                } else {
                    echo "<script>alert('Gagal update kelas');location.href='spp.php?id_spp=".$id_spp."';</script>";
                }
            } 
        }
        } else{
            if ($cek > 0) {
                echo "<script>window.alert('angkatan yang anda yang anda masukan sudah ada')
            window.location='spp.php'</script>";
            } else {
    
            if(empty($angkatan)){
                echo "<script>alert('nama kelas tidak boleh kosong');location.href='spp.php';</script>";
            } else {
                $update=mysqli_query($conn,"update spp set angkatan='".$angkatan."',tahun='".$tahun."',nominal='".$nominal."' where id_spp= '".$id_spp."'") or die(mysqli_error($conn));
                if($update){
                    echo "<script>alert('Sukses update kelas');location.href='spp.php';</script>";
                } else {
                    echo "<script>alert('Gagal update kelas');location.href='spp.php?id_spp=".$id_spp."';</script>";
                }
            } 
        }
        }
    
?>