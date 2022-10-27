<?php 
    include '../koneksi/koneksi.php';
    session_start();

    $id_spp = $_GET['id_pembayaran'];
    $NISN = $_GET['NISN'];

    $qry=mysqli_query($conn,"select * from petugas where username = '".$_SESSION['username']."'");
    $dt_admin=mysqli_fetch_array($qry);
    $id_petugas = $dt_admin['id_petugas'];
    $tgl_bayar = date('Y-m-d');

    $bayar = mysqli_query($conn ,"UPDATE pembayaran SET 
            tgl_bayar = '$tgl_bayar',
            keterangan = 'lunas',
            id_petugas = '$id_petugas' 
            WHERE id_pembayaran = '$id_spp'");

    if($bayar){
        header('location: bayar_admin.php?NISN='.$NISN);
    }else{
        echo "
			<script>
			alert('gagal')
			</script>
			";
    }
?>