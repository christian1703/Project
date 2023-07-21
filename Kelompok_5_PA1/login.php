<?php 
require('layout/main.php');

struktur_awal('Masuk');

if(isset($_SESSION['id']))
    {
        redirect('index.php');
    }
?>

<div class="container">
    <div class="col-lg-6 mx-auto pt-5 mt-5 shadow p-5">
            <h4 class="text-center">Silahkan login</h4>
                <div class="col bg-white formContent">
                    <form class="form" method="POST" action="proses-login.php">
                        
                        <div class="form-group mb-4">
                        </div>

                        <label class="sr-only" for="inlineFormInputGroupUsername2">username</label>
                            <div class="input-group mb-4 mr-sm-2 margin">
                                <div class="input-group-prepend">
                                <div class="input-group-text bg-dark text-white"><span class="fa fa-user"></span></div>
                                </div>
                                <input type="text" class="form-control br" id="inlineFormInputGroupUsername2" placeholder="username" name="username" autofocus>
                            </div>

                        <label class="sr-only" for="inlineFormInputGroupUsername2">password</label>
                            <div class="input-group mb-4 mr-sm-2 margin">
                                <div class="input-group-prepend">
                                <div class="input-group-text bg-dark text-white"><span class="fa fa-key"></span></div>
                                </div>
                                <input type="password" class="form-control br" id="inlineFormInputGroupUsername2" placeholder="password" name="password">
                            </div>
                            <?php
                                if(isset($_SESSION['login_gagal'])){
                                    echo '<div class="mb-3"><a class="text-danger">Username / Password Salah</a></div>';
                                    unset($_SESSION['login_gagal']);
                                }
                            ?>
                        <div class="form-check mb-3 mr-sm-2 margin">
                            <input class="form-check-input" type="checkbox" id="inlineFormCheck">
                            <label class="form-check-label" for="inlineFormCheck">
                            Remember me
                            </label>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-success col br" name="login">Login</button>
                            <br>
                            <a href="index.php" class="btn btn-dark col mt-3"><span class="fa fa-chevron-left"></span> Kembali</a>
                        </div>
                        <div class="form-group">
                            
                        </div>
                            
                    </form>
                </div>
            </div>
    </div>