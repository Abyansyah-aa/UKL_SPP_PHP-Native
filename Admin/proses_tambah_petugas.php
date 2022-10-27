<?php
    if($_POST){
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $nama_petugas = $_POST['nama_petugas'];
        $level = $_POST['level'];

        include "../koneksi/koneksi.php";
        $cek = mysqli_num_rows(mysqli_query($conn, "select * from petugas where username='$username' or password='$password' "));

            if ($cek > 0) {
                echo "<script>window.alert('username dan password yang anda yang anda masukan sudah ada')
            window.location='petugas.php'</script>";
            } else {
                if(empty($username)){
                    echo "<script>alert('username tidak boleh kosong');location.href='petugas.php';</script>";
                } elseif(empty($password)){
                    echo "<script>alert('password tidak boleh kosong');location.href='petugas.php';</script>";
                } elseif(empty($nama_petugas)){
                    echo "<script>alert('nama petugas tidak boleh kosong');location.href='petugas.php';</script>";
                } elseif(empty($level)){
                    echo "<script>alert('level tidak boleh kosong');location.href='petugas.php';</script>";
                } else {
                    include "../koneksi/koneksi.php";
                    //menambahkan data ke tabel
                    $insert = mysqli_query($conn,"insert into petugas (username, password, nama_petugas, level) value ('".$username."','".md5($password)."','".$nama_petugas."','".$level."')");
                if($insert){
                    echo "<script>alert('Sukses menambahkan petugas');location.href='petugas.php';</script>";
                } else {
                    echo "<script>alert('Gagal menambahkan petugas');location.href='petugas.php';</script>";
                }
                }
            }
        
    }
?>