<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title></title>
</head>
<body>
    <h3>Tambah Siswa</h3>
    <form action="proses_tambah_kelas.php" method="post">
        Nama Kelas
        <input type="text" name="nama_kelas" value="" class="form-control">
        Jurusan : 
        <select name="jurusan" id="" class="form-control">
            <option value=""></option>
            <option value="RPL">RPL</option>
            <option value="TKJ">TKJ</option>
        </select>
        Angkatan
        <input type="text" name="angkatan" value="" class="form-control">
        <input type="submit" name="simpan" value="Tambah Siswa" class="btn btn-primary">
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>
