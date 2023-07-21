<?php
    require_once('layout/koneksi.php');
    
    if(isset($_GET['id']))
    {
        $id = $_GET['id'];
        
        $sql =  "DELETE FROM sparepart where id = ".$id;
        $delete = mysqli_query($database, $sql);

        if($delete){
            redirect("/pa/admin-daftar-barang.php");
        }
    }

?>