<?php 
require('layout/main.php');

struktur_awal('Admin');

nav(); 
if(!isset($_SESSION['role_admin']))
{
    redirect('login.php');
}
?>  
<div class="container-fluid admin">
    <div class="row">
        <div class="col-lg-2 left-side">
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
            <h3 class="mt-4 ml-4"><span class="fa fa-list mr-2"></span> Daftar akun</h3>
            <hr class="">
            <div class="col-lg-10 mx-auto bg-white p-5 mt-5">
                    <table class="table table-bordered mt-4 text-center">
                        <thead>
                            <tr>
                            <th scope="col">id</th>
                            <th scope="col">Nama</th>
                            <th scope="col">alamat</th>
                            <th scope="col">no_hp</th>
                            <th scope="col"><span class="fa fa-cog"></span></th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                            $results = getAllItem('users');
                            foreach($results as $result)
                            {
                        ?>
                            <tr>
                            <td><?=$result['id_user']?></td>
                            <td><?=$result['nama']?></td>
                            <td><?=$result['alamat']?></td>
                            <td><?=$result['no_hp']?></td>
                            <td><a href="proses-delete-admin-akun.php?id=<?=$result['id_user']?>"><span class="text-danger fa fa-trash"></span></a></td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
        </div>
    </div>
</div>


<?php struktur_akhir(); ?>