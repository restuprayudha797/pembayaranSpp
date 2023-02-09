<?php

require 'config/function.php';

if (isset($_POST['tRegister'])) {

    Registrasi();
    die;
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/bootstrap.css">

    <style>
    .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
    }

    @media (min-width: 768px) {
        .bd-placeholder-img-lg {
            font-size: 3.5rem;
        }
    }

    .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
    }

    .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
    }

    .bi {
        vertical-align: -.125em;
        fill: currentColor;
    }

    .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
    }

    .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
    }
    </style>


    <!-- Custom styles for this template -->
    <link href="assets/css/login.css" rel="stylesheet">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/sign-in/">
</head>

<body class="text-">



    <!-- membuat halam login dimana users dapat dipastikan tidak dapat mengakses fitur yang kami sediakan sebelum mereka login terlebih dahulu
    sehingga dapat disimpulkan dengan adanya fitur ini cukup membantu untuk mengamankan data -->



    <!-- start Login  -->

    <main class="form-signin w-100 m-auto">


        <div class="judul mb-5">
            <h3 class="">Halaman Register</h3>
            <hr>
        </div>

        <form action="" method="post">

            <div class="form-floating">
                <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan username">
                <label for="username">Username</label>
            </div>
            <div class="form-floating mt-3">
                <input type="password" class="form-control" id="password" name="password"
                    placeholder="Masukkan Password">
                <label for="password">Password</label>
            </div>

            <div class="checkbox mb-3 text-start">
                <label>
                    <input type="checkbox" value="remember-me"> Ingat saya
                </label>
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit" name="tRegister">Register</button>
            <p class="mt-5 mb-3 text-muted text-center">&copy; 2023</p>
        </form>
    </main>

    <!-- akhir login -->




    <!-- mulai script -->

    <script src="assets/js/bootstrap.min.js"></script>


    <!-- akhir script -->
</body>

</html>