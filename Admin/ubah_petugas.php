<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title></title>
</head>
<body>
    <?php 
    include "../koneksi/koneksi.php";
    $qry_get_siswa=mysqli_query($conn,"select * from petugas where 
    id_petugas = '".$_GET['id_petugas']."'");
    $dt_siswa=mysqli_fetch_array($qry_get_siswa);
    ?>
    <h3>Ubah Produk</h3>
    <form action="proses_ubah_petugas.php" method="post">
        <input type="hidden" name="id_petugas" value= 
        "<?=$dt_siswa['id_petugas']?>">
        Nama petugas :
        <input type="text" name="nama_petugas" value= 
        "<?=$dt_siswa['nama_petugas']?>" class="form-control">
        Username :
        <input type="text" name="username" value= 
        "<?=$dt_siswa['username']?>" class="form-control">
        Password :
        <input type="text" name="password" value= 
        "<?=$dt_siswa['password']?>" class="form-control">
        <input type="submit" name="simpan" value="Ubah Siswa" class="btn btn-primary">
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>
