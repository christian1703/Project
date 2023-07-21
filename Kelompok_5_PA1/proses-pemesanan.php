<?php
    require_once('layout/koneksi.php');
    var_dump($_POST);
    var_dump($_SESSION);
    
    if(isset($_SESSION['role_admin']))
    {
        redirect('index.php');
    }
    elseif(isset($_SESSION['role_user']))
    {
        if(isset($_POST))
        {
            $id_user = $_SESSION['id'];
            $id_sparepart = $_POST['id_sparepart'];
            $jumlah = $_POST['jumlah'];

            $db = $GLOBALS['database'];
            if ($db->connect_error) {
                die("Connection failed: " . $db->connect_error);
            }
            
            $query = "INSERT INTO pemesanan (id_user, id_sparepart, jumlah, status)
          VALUES ($id_user, $id_sparepart, $jumlah, 'not_ver')";
          
            if ($db->query($query) === TRUE) {
              echo "New record created successfully";
            } 
            else {
                echo "Error: " . $query . "<br>" . $db->error;
            }

            $db->close();

            redirect('pemesanan.php');
        }

    }
    else
    {
        redirect('login.php');
    }
    

?>