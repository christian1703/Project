<?php
    require_once('layout/koneksi.php');

    session_destroy();
    redirect('index.php');
?>