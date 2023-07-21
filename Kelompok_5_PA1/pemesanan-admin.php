<?php 
require('layout/main.php');

struktur_awal('Pemesanan');

nav(); 
if(!isset($_SESSION['role_admin']))
{
    redirect('login.php');
}
error_reporting(E_ERROR);
?>

<div class="container mt-5">
<h2>Daftar Pesanan Masuk</h2>
<hr>

<?php 
        $id_user = $_SESSION['id'];
        $results = getPemesananBy3Join();

        foreach($results as $result)
        { ?>
           
        <div class="col-lg-12 mt-4 list-pesan-user">
            
            <div class="row shadow-sm border ">
                <div class="col-lg-3">
                    <img src="<?= img($result['img_sparepart']) ?>" alt="" width="250px" height="250px">        
                </div>
                <div class="col pl-4 border-left">
                    <h5 class="mt-4"><?= $result['nama_sparepart'] ?></h5>
                    <p>Jumlah : <?=$result['jumlah']?></p>
                    <p>Pemesan : <?=$result['id_user']?></p>
                    <h5>Pemesan</h5>
                    
                    <p class="badge badge-primary"><?= $result['nama'] ?></p>
                </div>

                <div class="col-lg-1 bg-danger text-center pt-5">
                    <div class="mt-5 pt-2">
                        <a href="proses-delete-pemesanan.php?id=<?=$result['id_pemesanan']?>" class="text-white "><span class="fa fa-trash"></span></a>
                    </div>
                </div>
            </div>

        </div>

        <?php } ?>
</div>

<?php struktur_akhir(); ?>