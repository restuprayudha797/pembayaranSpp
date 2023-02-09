<?php

$host = "localhost";
$username = "root";
$password = "";
$dbName = 'spp_muda';


$conn = mysqli_connect($host, $username, $password, $dbName);

if (!$conn) {

    echo 'Gagal Connect kedatabase';
}



function query($query)
{
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {

        $rows[] = $row;
    }

    return $rows;
}
