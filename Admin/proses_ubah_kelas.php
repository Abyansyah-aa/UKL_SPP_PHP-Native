<?php
    include "../koneksi/koneksi.php";
    if($_POST){
        $id_kelas=$_POST['id_kelas'];
        $nama_kelas=$_POST['nama_kelas'];
        $jurusan=$_POST['jurusan'];
        $angkatan=$_POST['angkatan'];

        $cek = mysqli_query($conn,"select * from kelas where id_kelas='$id_kelas'" );
        $p=mysqli_fetch_array($cek);

        if ($p['angkatan']==$angkatan && $p['nama_kelas']==$nama_kelas ) {
            echo "<script>window.alert('Nama kelas yang anda yang anda masukan sudah ada')
        window.location='kelas.php'</script>";
        } elseif($p['angkatan']!=$angkatan && $p['nama_kelas']==$nama_kelas ){
        
        if(empty($nama_kelas)){
            echo "<script>alert('nama kelas tidak boleh kosong');location.href='tampil_kelas.php';</script>";
        } else {
            $update=mysqli_query($conn,"update kelas set nama_kelas='".$nama_kelas."',jurusan='".$jurusan."',angkatan='".$angkatan."' where id_kelas= '".$id_kelas."'") or die(mysqli_error($conn));
            if($update){
                echo "<script>alert('Sukses update kelas');location.href='kelas.php';</script>";
            } else {
                echo "<script>alert('Gagal update kelas');location.href='kelas.php?id_kelas=".$id_kelas."';</script>";
            }
        }
    }
    }
    
?>