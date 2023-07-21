<?php
    require_once('layout/koneksi.php');
    var_dump($_POST);
    var_dump($_FILES);


    // FORM
    
    if(isset($_POST["submit"])) {
        
    // GAMBAR
    $namafile = $_FILES['img_sparepart']['name'];
    var_dump($_FILES['img_sparepart']['name']);
    $ukuranfile = $_FILES['img_sparepart']['size'];
    $tmpName = $_FILES['img_sparepart']['tmp_name'];
    var_dump($_FILES['img_sparepart']['tmp_name']);
    $error = $_FILES['img_sparepart']['error'];

    if ($error === 4) {
        redirect('/admin.php');
    }

    $ektensionGambarValid = ['jpg', 'jpeg', 'png', 'JPG'];
    $ekstensionGambar = explode('.', $namafile);
    $ekstensionGambar = strtolower(end($ekstensionGambar));

    if (!in_array($ekstensionGambar, $ektensionGambarValid)) {
        redirect('/admin.php');
    }

    elseif ($ukuranfile > 10000000) {
        redirect('/admin.php');
    }

    //generate nama baru 
    $namafilebaru = uniqid();
    $namafilebaru .= '.';
    $namafilebaru .= $ekstensionGambar;
    $direktori = "static/img/";
    $direktoriFinal = "$direktori" . $namafilebaru;
    move_uploaded_file($tmpName, $direktoriFinal);
        
        
        $nama_sparepart     = $_POST['nama_sparepart'];
        $deskripsi  = $_POST['deskripsi'];
        $harga = $_POST['harga'];
        $stok       = $_POST['stok'];
        $img_sparepart    = $namafilebaru;

        $sql =  "INSERT INTO sparepart
                (nama_sparepart, deskripsi, harga, stok, img_sparepart)
                VALUES
                ('$nama_sparepart', '$deskripsi', '$harga', '$stok', '$img_sparepart');";

        $post = mysqli_query($database, $sql);

        if($post){
            redirect("/pa/admin-daftar-barang.php");
        }
        else{
            redirect('/admin.php');
        }
    }