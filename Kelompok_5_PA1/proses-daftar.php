<?php
    require_once('layout/koneksi.php');
    var_dump($_POST);


    // FORM
    
    if(isset($_POST["submit"])) {
        
        $nama  = $_POST['nama'];
        $nohp = $_POST['nohp'];
        $alamat       = $_POST['alamat'];
        $username       = $_POST['username'];
        $password       = $_POST['password'];
        

        $sql =  "INSERT INTO users
                (nama, username, password, alamat, no_hp, role)
                VALUES
                ('$nama', '$username', '$password', '$alamat', $nohp, 'user');";

        echo '<br>'.$sql;

        $post = mysqli_query($database, $sql);

        if($post){
            redirect("login.php");
        }
    }
