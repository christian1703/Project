<?php
    session_start();
    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "bengkel";

    $database = new mysqli($servername, $username, $password, $dbname);


    function custom_echo($txt, $length)
    {   
        if(strlen($txt)<=$length)
        {
            echo $txt;
        }
        else
        {
            $new_txt = substr($txt,0,$length) . '...';
            echo $new_txt;
        }
    }

    function alert($msg) {
        echo "<script type='text/javascript'>alert('$msg');</script>";
    }

    function redirect($location)
    {
        header('Location: ' . $location);
    }

    function getAllItem($table)
    {
        $query = 'select * from ' . $table;
        $db = $GLOBALS['database'] -> query($query);

        while($row = $db->fetch_assoc()){
            $result[] = $row;
        }
        return $result;
    }
    function getAllItemByIdUser($table, $id_user)
    {
        $query = 'select * from ' . $table . ' where id_user = ' . $id_user;
        $db = $GLOBALS['database'] -> query($query);

        while($row = $db->fetch_assoc()){
            $result[] = $row;
        }
        return $result;
    }

    function getPemesananByJoin($id_user , $status)
    {
        $query = 'select * from pemesanan p inner join sparepart s on p.id_sparepart = s.id where id_user = '.$id_user. ' and status = ' . "'$status'";
        // echo $query;
        $db = $GLOBALS['database'] -> query($query);

        while($row = $db->fetch_assoc()){
            $result[] = $row;
        }
        return $result;
    }

    function getPemesananBy3Join()
    {
        $query = 'select * from pemesanan p 
        inner join sparepart s  on p.id_sparepart = s.id 
        inner join users u on p.id_user = u.id_user where status = "not_ver"';
        // echo $query;
        $db = $GLOBALS['database'] -> query($query);

        while($row = $db->fetch_assoc()){
            $result[] = $row;
        }
        return $result;
    }

    function getItem($id)
    {
        $query = 'select * from sparepart where id = '.$id;
        $db = $GLOBALS['database'] -> query($query);

        while($row = $db->fetch_assoc()){
            $result = $row;
        }
        return $result;
    }
    
    function insertPemesanan($id_user, $id_barang)
    {
        $query = 'INSERT INTO pemesanan(id_user, id_sparepart, jumlah)
        VALUES()';
    }