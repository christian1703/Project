<?php 
require('layout/main.php');

struktur_awal('Daftar');

if(isset($_SESSION['id']))
    {
        redirect('index.php');
    }
?>

<div class="container">
    <div class="col-lg-6 mx-auto pt-5 mt-5 shadow p-5">
            <h4 class="text-center">Silahkan Daftar</h4>
                <div class="col bg-white formContent">
                    <form class="proses-daftar.php" method="POST" action="proses-daftar.php">
                        
                        <div class="form-group mb-4 mt-5">
                            <input type="text" class="form-control br" id="inlineFormInputGroupUsername2" placeholder="Nama lengkap" name="nama">
                        </div>
                        <div class="form-group mb-4">
                            <input type="number " class="form-control br" id="inlineFormInputGroupUsername2" placeholder="No HP" name="nohp">
                        </div>
                        <div class="form-group mb-4">
                            <input type="text" class="form-control br" id="inlineFormInputGroupUsername2" placeholder="Alamat" name="alamat">
                        </div>

                        <div class="form-group">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text fa fa-user pt-2"></span>
                                </div>
                                    <input type="text" class="form-control" placeholder="Username" aria-label="Username" name="username"  aria-describedby="basic-addon1">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text fa fa-key pt-2"></span>
                                </div>
                                    <input type="password" class="form-control" placeholder="Password" aria-label="password" name="password"  aria-describedby="basic-addon1">
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-dark col br" name="submit">Daftar</button>
                            <br>
                            <a href="index.php" class="btn btn-info col mt-3"><span class="fa fa-chevron-left"></span> Kembali</a>
                        </div>
                        <div class="form-group">
                            
                        </div>
                            
                    </form>
                </div>
            </div>
    </div>