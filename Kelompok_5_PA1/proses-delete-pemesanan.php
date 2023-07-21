<?php
    require_once('layout/koneksi.php');
    
    if(isset($_GET['id']))
    {
        $id = $_GET['id'];
        
        $sql =  "DELETE FROM pemesanan where id_pemesanan = ".$id;
        $delete = mysqli_query($database, $sql);

        if($delete){
            redirect("pemesanan.php");
        }
    }

?>