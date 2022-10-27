<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title></title>
</head>
<body>
    <?php 
    include "../koneksi/koneksi.php";
    $qry_get_siswa=mysqli_query($conn,"select * from kelas where 
    id_kelas = '".$_GET['id_kelas']."'");
    $dt_siswa=mysqli_fetch_array($qry_get_siswa);
    ?>
    <h3>Ubah Produk</h3>
    <form action="proses_ubah_kelas.php" method="post">
        <input type="hidden" name="id_kelas" value= 
        "<?=$dt_siswa['id_kelas']?>">
        Nama Kelas :
        <input type="text" name="nama_kelas" value= 
        "<?=$dt_siswa['nama_kelas']?>" class="form-control">
        Jurusan
        <select name="jurusan" id="id_kelas" class="form-control">
            <option value=""><?=$dt_siswa['jurusan']?></option>
            <option value="">RPL</option>
            <option value="">TKJ</option>
        </select>
        Angkatan : 
        <input type="text" name="angkatan" value="<?=$dt_siswa['angkatan']?>" class="form-control">
        <input type="submit" name="simpan" value="Ubah Siswa" class="btn btn-primary">
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>
