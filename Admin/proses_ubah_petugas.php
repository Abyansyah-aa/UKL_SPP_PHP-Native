<?php
    include "../koneksi/koneksi.php";
    if($_POST){
        $id_petugas=$_POST['id_petugas'];
        $username=$_POST['username'];
        $password=$_POST['password'];
        $nama_petugas=$_POST['nama_petugas'];
        
        include "../koneksi/koneksi.php";
        $cek = mysqli_num_rows(mysqli_query($conn, "select * from petugas where username='$username'"));
        if(empty($username)){
            echo "<script>alert('nama kelas tidak boleh kosong');location.href='petugas.php';</script>";
        } else {
            $update=mysqli_query($conn,"update petugas set username='".$username."',password='".md5($password)."',nama_petugas='".$nama_petugas."',id_petugas='".$id_petugas."' where id_petugas= '".$id_petugas."'") or die(mysqli_error($conn));
            if($update){
                echo "<script>alert('Sukses update kelas');location.href='petugas.php';</script>";
            } else {
                echo "<script>alert('Gagal update kelas');location.href='petugas.php?id_petugas=".$id_petugas."';</script>";
            }
        }
    }
    
?>