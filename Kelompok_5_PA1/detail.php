<?php 
require('layout/main.php');

struktur_awal('Home');

nav();

if(isset($_GET))
{
    $id = $_GET['id'];
}
$result = getItem($id);
?>

<div class="container pt-4 shadow p-5">
    <h3><?= $result['nama_sparepart'] ?></h3>
    <hr>
    <div class="row">
        <div class="col">
            <div class="text-center">
                <img src="<?= img($result['img_sparepart'])?>" alt="" width="400px" height="400px">
            </div>
        </div>
        <div class="col">
            <div class="pt-4">
                <h5>Stok</h5>
                <p><?=$result['stok']?></p>	
            </div>
            <div>
                <h5>Deskripsi</h5>
                <p><?=$result['deskripsi']?></p>	
            </div>
            <div>
                <h5>Harga</h5>
                <p>Rp <?= number_format($result['harga'])?></p>	
            </div>
            <form action="proses-pemesanan.php" method="POST">
                <input type="number" class="form-control mb-4" min="1" max="<?=$result['stok']?>" name="jumlah">
                <input type="hidden" value="<?=$result['id']?>" name="id_sparepart">
                <input type="submit" class="btn btn-primary" value="Pesan">
            </form>
            
        </div>
    </div>
</div>


<?php struktur_akhir(); ?>