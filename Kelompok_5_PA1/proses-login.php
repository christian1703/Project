<?php
    require_once('layout/koneksi.php');

    if(isset($_POST['login']))
    {
        $db = $database;

        $username = $_POST['username'];
        $password = $_POST['password'];
        
        $login = false;

        $query = "SELECT * FROM users";
        $db = $GLOBALS['database'] -> query($query);

        while($row = $db->fetch_assoc()){
            $result[] = $row;
        }

        foreach($result as $key => $value)
        {
            $login = ($value['username'] === $username && $value['password'] === $password) ? true : false;
            if($login) break;
        }
        
        if($login)
        {
            if($value['role'] === "admin")
            {
                $_SESSION['role_admin'] = TRUE;
                $_SESSION['id'] = $value['id_user'];
                redirect('admin.php');        
            }
            elseif($value['role'] === "user")
            {
                $_SESSION['role_user'] = TRUE;
                $_SESSION['id'] = $value['id_user'];
                redirect('index.php');
            }
        }
        else
        {
            $_SESSION['login_gagal'] = TRUE;
            redirect('login.php');
        }
        
    }

?>