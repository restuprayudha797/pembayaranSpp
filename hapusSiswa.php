<?php

require 'config/function.php';

$id_siswa = $_GET['id'];



$delete =  mysqli_query($conn, "DELETE FROM `siswa` WHERE nisn = '$id_siswa'");

if ($delete) {

    echo '<script>alert("Data siswa berhasil dihapus"); window.location="../siswa.php"</script>';
} else {

    echo 'gagal';
}
