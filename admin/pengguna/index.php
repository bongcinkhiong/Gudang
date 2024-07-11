<?php 
require 'function.php';

session_start();

if(!isset($_SESSION["username"])) {
    echo "
        <script>
            alert('Silahkan Login Terlebih Dahulu');
            document.location.href = '../../auth/login/index.php';
        </script>
    ";
}

if(isset($_POST["add"])){
    if(add($_POST) > 0){
        echo "
            <script type='text/javascript'>
                alert('Data Berhasil di Tambahkan');
                document.location.href = 'index.php';
            </script>
        ";
    }else{
        echo "
            <script type='text/javascript'>
                alert('Data Gagal Disimpan');
                document.location.href = 'index.php';
            </script>
        ";
    }
}

?>

<head>
<title>Gudang Hengky</title>
<link rel="shortcut icon" href="../../layouts/favicon.ico" type="image/x-icon">
</head>

<?php include '../../layouts/sidebar.php' ?>
<h2>Data Pengguna </h2> <br>

<button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
    Tambah Akun
</button>

<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Pengguna</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body ">
            <form action="" method="post">
                <label for="" class="col-form-label">Username</label>
                <input type="text" class="form-control" name="username" required> <br>

                <label for="" class="col-form-label">Password</label>
                <input type="password" class="form-control" name="password" required> <br>

                <input type="submit" name="add" value="submit" class="btn btn-success">
            </form>
        </div>
        </div>
    </div>
</div>

<form class="d-flex" role="search" method="GET">
    <input class="form-control me-2" name="cariJadwal" type="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-dark" name="cari" type="submit">Search</button>
</form>

<?php 
if(isset($_GET["cari"])) {
    $cari = $_GET["cariJadwal"];
    echo"<b> Hasil Pencarian : " . $cari . "</b>";
    $user = query("SELECT * FROM users WHERE username LIKE '%".$cari."%'");
}
?>

<?php
    if (isset ($_GET['cariJadwal'])) {
        $cari = $_GET['cariJadwal'];
        // jika sama dengan pencarian
        $user = mysqli_query($host, "SELECT * FROM users WHERE username LIKE '%".$cari."%'");
    } else {
        // jika beda, tampilkan semua barang
        $user = mysqli_query($host, "SELECT * FROM users");
    }
    ;
?>

<table class="table table-striped">
    <tr>
        <th>No</th>
        <th>Username</th>
        <th>Role</th>
        <th>Action</th>
    </tr>

    <?php $i = 1; ?>
    <?php foreach($user as $data) : ?>
        <tr>
            <td><?= $i++; ?></td>
            <td><?= $data["username"]; ?></td>
            <td><?= $data["role"]; ?></td>
            <td>
                <a href="edit.php?id_user=<?= $data["id_user"]; ?>" class="btn btn-success">Edit</a>
                <a href="hapus.php?id_user=<?= $data["id_user"]; ?>" class="btn btn-danger" onClick="return confirm('Apakah anda yakin ingin menghapus data ini?')">Hapus</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<?php include '../../layouts/footer.php' ?>