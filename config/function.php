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
        $password = password_hash($password, PASSWORD_DEFAULT);

        query("INSERT INTO `user`(`id_users`, `username`, `password`, `aktif`) VALUES ('','$username','$password', 1)");
    } else {

        echo 'username sudah tersedia';
    }
    // enkripsi password



    // akhir enkripsi






}
// akhir function Registrasi

// mulai function login
function login()
{


    $username = $_POST['username'];
    $password = $_POST['password'];

    global $conn;

    $user = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

    if (mysqli_num_rows($user)) {


        $row = mysqli_fetch_assoc($user);

        if (password_verify($password, $row['password'])) {




            header("Location: index.php");
        } else {

            echo 'password tidak sesuai';
            header("Location: login.php");
            die;
        }
    }








    var_dump($user);
}
// akhir function login