<?php

$host = "localhost";
$username = "root";
$pw = "";
$dbName = 'spp_muda';


$conn = mysqli_connect($host, $username, $pw, $dbName);

if (!$conn) {

    echo 'Gagal Connect kedatabase';
}



function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {

        $rows[] = $row;
    }

    return $rows;
}

// mulai function Registrasi
function Registrasi()
{


    // ambil data dari pengguna
    $username = $_POST['username'];
    $password = $_POST['password'];
    // akhir ambil data dari pengguna


    $user = query("SELECT * FROM user WHERE username = '$username'");

    if (!$user) {

        // enkripsi password
        $password = password_hash($password, PASSWORD_DEFAULT);
        // akhir enkripsi


        query("INSERT INTO `user`(`id_users`, `username`, `password`, `aktif`) VALUES ('','$username','$password', 1)");
    } else {

        echo 'username sudah tersedia';
    }
}
// akhir function Registrasi

// mulai function login
function login()
{


    $username = $_POST['username'];
    $password = $_POST['password'];

    global $conn;

    $user = mysqli_query($conn, "SELECT * FROM petugas WHERE username = '$username'");

    if (mysqli_num_rows($user)) {


        $row = mysqli_fetch_assoc($user);


        if (password_verify($password, $row['password'])) {


            $_SESSION['login'] = true;
            $_SESSION['id_petugas'] = $row['id_petugas'];

            echo '<script>alert("Login Berhasil"); window.location="login.php"</script>';

            exit;
        } else {

            echo '<script>alert("Password tidak sesuai silahkan cobalagi"); window.location="login.php"</script>';


            exit;
        }
    } else {

        echo '<script>alert("Username tidak dapat ditemukan silahkan cobalagi"); window.location="login.php"</script>';

        exit;
    }
}
// akhir function login


// awal tambahSiswa
function tambahSiswa()
{

    $nisn = $_POST['nisn'];
    $nis = $_POST['nis'];
    $nama = $_POST['nama'];
    $id_kelas = $_POST['id_kelas'];
    $alamat = $_POST['alamat'];
    $no_telp = $_POST['no_telp'];
    $id_spp = $_POST['id_spp'];

    global $conn;

    // cek apakah nisn sudah pernah terdaftar
    $cekNisn = query("SELECT * FROM siswa WHERE nisn = '$nisn'")[0];
    $cekNis = query("SELECT * FROM siswa WHERE nis = '$nis'")[0];
    // end cek nisn
    if (!empty($cekNisn)) {

        echo '<script>alert("Nisn Sudah Terdaftar silahkan cek kembali"); window.location="siswa.php"</script>';
        exit;
    } else {

        if (!empty($cekNis)) {

            echo '<script>alert("Nis Sudah Terdaftar silahkan cek kembali"); window.location="siswa.php"</script>';
        } else {

            $query = "INSERT INTO `siswa` (`nisn`, `nis`, `nama`, `id_kelas`, `alamat`, `no_telp`, `id_spp`) VALUES ('$nisn', '$nis', '$nama', '7', '$alamat', '$no_telp', '3')";

            $result = mysqli_query($conn, $query);

            if ($result) {
                echo '<script>alert("Data Siswa Berhasil didaftartkan"); window.location="siswa.php"</script>';
                exit;
            }

            echo '<script>alert("Data Siswa gagal didaftartkan"); window.location="siswa.php"</script>';
        }
    }
}

// akhir tambahSiswa