<?php
    if($_POST){
        $nama_kelas = $_POST['nama_kelas'];
        $jurusan = $_POST['jurusan'];
        $angkatan = $_POST['angkatan'];

        include "../koneksi/koneksi.php";
        $cek = mysqli_num_rows(mysqli_query($conn, "select * from kelas where nama_kelas='$nama_kelas'"));
        
        if ($cek > 0) {
            echo "<script>window.alert('Nama kelas yang anda yang anda masukan sudah ada')
        window.location='kelas.php'</script>";
        } else {
        
        if(empty($nama_kelas)){
            echo "<script>alert('nama kelas tidak boleh kosong');location.href='kelas.php';</script>";
        } else if(empty($jurusan)){
            echo "<script>alert('kompetensi keahlian tidak boleh kosong');location.href='kelas.php';</script>";
        }else {
            include "../koneksi/koneksi.php";
            $insert = mysqli_query($conn,"insert into kelas (nama_kelas, jurusan, angkatan) value ('".$nama_kelas."','".$jurusan."','".$angkatan."')");
        if($insert){
            echo "<script>alert('Sukses menambahkan kelas');location.href='kelas.php';</script>";
        } else {
            echo "<script>alert('Gagal menambahkan kelas');location.href='kelas.php';</script>";
        }
        }
    }
    }
?>