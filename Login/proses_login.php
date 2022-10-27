<?php 
error_reporting(E_ERROR | E_PARSE);
    if($_POST){
        include "../koneksi/koneksi.php";
        $username = $_POST['username'];
        $password = $_POST['password'];
        $NISN = $_POST['NISN'];

        $sql_petugas = mysqli_query($conn, "select * from petugas where username = '".$username."' and password = '".md5($password)."'");
        $sql_siswa = mysqli_query($conn, "select * from siswa where NISN = '".$NISN."' and password = '".md5($password)."'");
      
            if(mysqli_num_rows($sql_petugas) > 0) {
                $dt_login = mysqli_fetch_assoc($sql_petugas);
                if($dt_login['level'] == "admin") { 
                    session_start();
                    $_SESSION['username'] = $dt_login['username'];
                    $_SESSION['id_petugas'] = $dt_login['id_petugas'];
                    $_SESSION['nama_petugas'] = $dt_login['nama_petugas'];
                    $_SESSION['status_login'] = true;
                    $_SESSION['level'] = "admin";
                    echo "<script>alert('Success login as Admin'); location.href='../Admin/index.php';</script>";
                } else if($dt_login['level'] == "petugas") {
                    session_start();
                    $_SESSION['username'] = $dt_login['username'];
                    $_SESSION['id_petugas'] = $dt_login['id_petugas'];
                    $_SESSION['nama_petugas'] = $dt_login['nama_petugas'];
                    $_SESSION['status_login'] = true;
                    $_SESSION['level'] = "petugas";
                    echo "<script>alert('Success login as Petugas'); location.href='../petugas/index.php';</script>";
                }
            } else if(mysqli_num_rows($sql_siswa) > 0) {
                $dt_login = mysqli_fetch_assoc($sql_siswa);
                session_start();
                $_SESSION['NISN'] = $dt_login['NISN'];
                $_SESSION['nama'] = $dt_login['nama'];
                $_SESSION['status_login'] = true;
                echo "<script>alert('Succes login as Siswa'); location.href='../siswa/index.php';</script>";
            } else {
                echo "<script>alert('Username dan Password tidak benar'); location.href='index.php';</script>";
            }
        }

?>