<?php 
require('layout/main.php');

struktur_awal('Admin');

nav(); 
if(!isset($_SESSION['role_admin']))
{
    redirect('login.php');
}
$id = $_GET['id'];
$result = getItem($id);
?>  

<div class="container-fluid admin">
    <div class="row">
        <div class="col-lg-2 left-side shadow">
            <div class="nav-vertical mt-4 ml-3">
                <ul class="nav flex-column" id="exCollapsingNavbar3">
                    <li class="nav-item">
                        <a class="nav-link active" href="admin.php">Menambah barang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="admin-daftar-barang.php">Daftar Barang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="admin-daftar-akun.php">Daftar akun</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col right-side ">
            <h3 class="mt-4 ml-4"><span class="fa fa-edit mr-2"></span> Mengedit barang</h3>
            <hr class="">
        <div class="col-lg-8 mx-auto mt-5 bg-white p-5 border shadow-sm">
            <form action="proses-edit-admin-barang.php" method="POST" autocomplete="off" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="exampleInputEmail1">Nama barang</label>
                    <input type="hidden" value="<?=$result['id']?>" name="id_sparepart">
                    <input type="text" class="form-control" placeholder="Nama barang" name="nama_sparepart" value="<?=$result['nama_sparepart']?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Harga</label>
                    <input type="number" class="form-control" placeholder="Harga" name="harga" value="<?=$result['harga']?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Stok</label>
                    <input type="number" class="form-control" placeholder="Stok" name="stok" value="<?=$result['stok']?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Deskripsi</label>
                    <textarea name="deskripsi" id="" cols="30" rows="10" class="form-control" name="deskripsi" value=""><?=$result['deskripsi']?></textarea>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Gambar</label>
                    <input type="file" class="form-control" name="img_sparepart" accept="image/*">
                </div>
              
                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            </form>
        </div>
        </div>
    </div>
</div>


<?php struktur_akhir(); ?>