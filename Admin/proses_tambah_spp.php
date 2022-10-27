<?php
    if($_POST){
        $angkatan = $_POST['angkatan'];
        $tahun = $_POST['tahun'];
        $nominal = $_POST['nominal'];
       
        include "../koneksi/koneksi.php";
        $cek = mysqli_num_rows(mysqli_query($conn, "select * from spp where angkatan='$angkatan'"));

        if ($cek > 0) {
            echo "<script>window.alert('angkatan yang anda yang anda masukan sudah ada')
        window.location='spp.php'</script>";
        } else{

        if(empty($angkatan)){
            echo "<script>alert('angkatan tidak boleh kosong');location.href='spp.php';</script>";
        } elseif(empty($tahun)){
            echo "<script>alert('tahun tidak boleh kosong');location.href='spp.php';</script>";
        } elseif(empty($nominal)){
            echo "<script>alert('nominal tidak boleh kosong');location.href='spp.php';</script>";
        } else {
            include "../koneksi/koneksi.php";
            //menambahkan data ke tabel
            $insert = mysqli_query($conn,"insert into spp (angkatan, tahun, nominal) value ('".$angkatan."','".$tahun."','".$nominal."')");
        if($insert){
            echo "<script>alert('Sukses menambahkan petugas');location.href='spp.php';</script>";
        } else {
            echo "<script>alert('Gagal menambahkan petugas');location.href='spp.php';</script>";
        }
        }
    }
    }
    
?>