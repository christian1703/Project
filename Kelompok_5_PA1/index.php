<?php 
require('layout/main.php');

struktur_awal('Home');

nav(); 
?>

<div class="container pt-4">
        <div id="carouselExample" class="carousel slide shadow border" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExample" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExample" data-slide-to="1"></li>
            <li data-target="#carouselExample" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
            <img src="<?= img('satuu.jpg') ?>" height="500px" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
            <img src="<?= img('dua.jpg') ?>" height="500px" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
            <img src="<?= img('tiga.jpg') ?>" height="500px" class="d-block w-100" alt="...">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExample" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExample" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
        </div>

		<div class="mt-5">
			<h3>Daftar barang</h3>
			<div class="row ml-4">
			<?php 
				$results = getAllItem('sparepart'); 
				foreach($results as $result){
			?>
				<div class="col mt-4">
					<div class="card shadow mt-3" style="width: 18rem;">
						<a href="detail.php?id=<?=$result['id']?>"><img class="card-img-top border-bottom" src="<?= img($result['img_sparepart']) ?>" alt="Card image cap" width="250px" height="250px"></a>
						<div class="card-body">
							<h4><?= $result['nama_sparepart'] ?></h4>
							<p class="card-text">
							<?php custom_echo($result['deskripsi'], 20) ?>
							<p>
							
							</p>
							</p>
							<h5>Rp <?= number_format($result['harga']) ?></h5>
							<a href="detail.php?id=<?=$result['id']?>" class="btn btn-success"><span class="fa fa-search mr-2"></span> lihat barang</a>
						</div>
						<div>
						</div>
					</div>
				</div>
			<?php } ?>
			</div>
			
			
			
		</div>
</div>

</div>
        

<div class="container-fluid footer mt-5 mx-auto">

	<div class="col pt-4 text-center">
		<h5 class="mt-4">Contact Us :</h5><br>
		<a target="_blank" class="mr-3" rel="noreferrer" href="https://www.facebook.com/GokuTobingz/"><img class="icons" width="40" height="40" src="https://upload.wikimedia.org/wikipedia/commons/5/51/Facebook_f_logo_%282019%29.svg" title="facebook"></a>
		<a target="_blank" class="mr-3" rel="noreferrer" href="https://www.instagram.com/jeremi_tobing_/?hl=id/"><img class="icons" width="50" height="50" src="https://www.freepnglogos.com/uploads/instagram-logo-png-transparent-0.png" title="instagram"></a>
		<a target="_blank" class="mr-3" rel="noreferrer" href="https://api.whatsapp.com/send/?phone=6282273101303&text&app_absent=0"><img class="icons" width="50" height="50" src="https://image.flaticon.com/icons/png/512/124/124034.png" title="Whattsapp"></a>
	</div>	
</div>


<?php struktur_akhir(); ?>