<?php 
    include '../koneksi/koneksi.php';
    session_start();

    $id=$_POST['id'];
    $NISN=$_POST['NISN'];
    $NIS=$_POST['NIS'];
    $nama=$_POST['nama'];
    $id_kelas=$_POST['id_kelas'];
    $alamat=$_POST['alamat'];
    $no_tlp= $_POST['no_tlp'];
    $id_spp= $_POST['id_spp'];
    $password= $_POST['password'];
    
    $awaltempo = $_POST['jatuh_tempo'];

    $random=rand();
    
    $cek = mysqli_num_rows(mysqli_query($conn, "select * from siswa where NISN = '$NISN' or NIS = '$NIS' "));

    if ($cek > 0) {
        echo "<script>alert('NISN atau NIS sudah ada');location.href='siswa.php';</script>";
    } else{
    
    $result= mysqli_query($conn, "insert into siswa (NISN, NIS, nama, id_kelas, alamat, no_tlp, password, id) values ('" . $NISN . "', '" . $NIS . "', '" .$nama . "', '" .$id_kelas . "', '" .$alamat . "', '" .$no_tlp . "', '" .md5($password) . "', '" .$random. "')");
    
    if(!$result){
        echo "<script>alert('Failed add student');location.href='siswa.php';</script>";
    }else{
        for($i=0; $i<12; $i++){
        $jatuhtempo = date("Y-m-d" , strtotime("+$i month" , strtotime($awaltempo)));
 		$bulan_spp     = date("m" ,strtotime($jatuhtempo));
        $tahun_spp = date("Y", strtotime($jatuhtempo));

        $add = mysqli_query($conn,"INSERT INTO pembayaran(NISN, jatuh_tempo, bulan_spp, id_spp, tahun_spp) 
        VALUES ('$NISN','$jatuhtempo','$bulan_spp','$id_spp', '$tahun_spp')");
        echo "<script>alert('Success add student');location.href='siswa.php';</script>";           
        }
    }
    } 
?>



