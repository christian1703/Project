<?php
    require('koneksi.php');
    
    function struktur_awal($title){
        echo('<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>'. $title .'</title>
    <link rel="stylesheet" href="static/bootstrap/css/layout.css">
    <link rel="stylesheet" href="static/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="static/fontawesome/font-awesome.css">
</head>
<body>
');}


    function struktur_akhir(){
        echo('<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="static/bootstrap/js/bootstrap.js"></script>
</body>
</html>');}


    function nav(){
        if(isset($_SESSION['role_admin']))
        {
            echo('
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark p-3">
        <div class="container">
            <a class="navbar-brand" href="index.php"> <span class="fa fa-motorcycle"></span> PARULIAN MOTOR</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-3">
                <li class="nav-item">
                    <a class="nav-link" href="index.php"><span class="fa fa-home"></span> Beranda</span></a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="pemesanan-admin.php"><span class="fa fa-shopping-cart"></span> Pemesanan Masuk</a>
                </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="fa fa-user"></span>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="admin.php">Halaman Admin</a>
                            <a class="dropdown-item" href="proses-logout.php">Logout</a>
                        </div>
                    </li>
                </ul>
                
            </div>
        </div>
    </nav>');
        }
        elseif(isset($_SESSION['role_user'])){
            echo('
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark p-3">
        <div class="container">
            <a class="navbar-brand" href="index.php"> <span class="fa fa-motorcycle"></span> PARULIAN MOTOR</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-3">
                <li class="nav-item">
                    <a class="nav-link" href="index.php"><span class="fa fa-home"></span> Beranda</span></a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="pemesanan.php"><span class="fa fa-shopping-cart"></span> Pemesanan</a>
                </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="fa fa-user"></span>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="proses-logout.php">Logout</a>
                        </div>
                    </li>
                </ul>
                
            </div>
        </div>
    </nav>');
        }
        else
        {
            echo('
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark p-3">
        <div class="container">
            <a class="navbar-brand" href="index.php"> <span class="fa fa-motorcycle"></span> PARULIAN MOTOR</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-3">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php"><span class="fa fa-home"></span> Beranda</span></a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="pemesanan.php"><span class="fa fa-shopping-cart"></span> Pemesanan</a>
                </li>
                </ul>
               
                <ul class="navbar-nav ml-auto">
                <li class="nav-item ml-auto">
                    <a class="nav-link" href="login.php">Masuk</a>
                </li>
                <li class="nav-item ml-auto">
                    <a class="nav-link" href="daftar.php">Daftar</a>
                </li>
                </ul>
            </div>
        </div>
    </nav>');
        }
    }

    function img($img){
        echo ('static/img/' . $img);    
    }

    
?>
