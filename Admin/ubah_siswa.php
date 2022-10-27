<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title></title>
</head>
<body>
    <?php 
    include "../koneksi/koneksi.php";
    $qry_get_siswa=mysqli_query($conn,"select * from siswa where 
    NISN = '".$_GET['NISN']."'");
    $dt_siswa=mysqli_fetch_array($qry_get_siswa);
    ?>
    <h3>Ubah Produk</h3>
    <form action="proses_ubah_siswa.php" method="post">
        NISN :
        <input type="text" name="NISN" value= 
        "<?=$dt_siswa['NISN']?>" class="form-control">
        NIS
        <input type="text" name="NIS" value=   "<?=$dt_siswa['NIS']?>" class="form-control">
        Nama : 
        <input type="text" name="nama" value="<?=$dt_siswa['nama']?>" class="form-control">
        Kelas :     
        <select name="id_kelas" class="form-control">
            <option></option>
            <?php 
            include "../koneksi/koneksi.php";
            $qry_kelas=mysqli_query($conn,"select * from kelas");
            while($data_kelas=mysqli_fetch_array($qry_kelas)){
                echo '<option value="'.$data_kelas['id_kelas'].'">'.$data_kelas['nama_kelas'].'</option>';    
            }
            ?>
        </select>
        Alamat : 
        <input type="text" name="alamat" value="<?=$dt_siswa['alamat']?>" class="form-control">
        No Telepon : 
        <input type="text" name="no_tlp" value="<?=$dt_siswa['no_tlp']?>" class="form-control">
        Password : 
        <input type="password" name="password" value="" class="form-control">
        <input type="submit" name="simpan" value="Ubah Siswa" class="btn btn-primary">
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>
