<?php
    include "../koneksi/koneksi.php";
    if($_POST){

        $id=$_POST['id'];
        $NISN=$_POST['NISN'];
        $NIS=$_POST['NIS'];
        $nama=$_POST['nama'];
        $id_kelas=$_POST['id_kelas'];
        $alamat=$_POST['alamat'];
        $no_tlp=$_POST['no_tlp'];
        $password=$_POST['password'];
        
        $cek = mysqli_num_rows(mysqli_query($conn, "select * from siswa where NISN='$NISN' or NIS='$NIS' "));

    if (empty($password)) {
            $update=mysqli_query($conn,"update siswa set NISN='".$NISN."',NIS='".$NIS."',nama='".$nama."',id_kelas='".$id_kelas."',alamat='".$alamat."',no_tlp='".$no_tlp."' where id= '".$id."'") or die(mysqli_error($conn));
            if($update){
                echo "<script>alert('Sukses update siswa');location.href='siswa.php';</script>";
            } else {
                echo "<script>alert('Gagal update siswa');location.href='siswa.php?nisn=".$nisn."';</script>";
            }
    } else {
        if(empty($NISN)){
            echo "<script>alert('nisn tidak boleh kosong');location.href='siswa.php';</script>";
        } else {
            $update=mysqli_query($conn,"update siswa set  NISN='".$NISN."',NIS='".$NIS."',nama='".$nama."',id_kelas='".$id_kelas."',alamat='".$alamat."',no_tlp='".$no_tlp."',password='".md5($password)."' where id= '".$id."'") or die(mysqli_error($conn));
            if($update){
                echo "<script>alert('Sukses update siswa');location.href='siswa.php';</script>";
            } else {
                echo "<script>alert('Gagal update siswa');location.href='siswa.php?nisn=".$nisn."';</script>";
            }
        }
    }
   

    }
    
?>