<?php 
require 'function.php'; 

if (!isset($_SESSION['username'])) {
    echo "
        <script>
            alert('Silahkan Login Terlebih Dahulu');
            document.location.href = '../../auth/login/index.php';
        </script>
    ";
}

if (isset($_POST["add"])) {
    if (add($_POST) > 0) {
        echo "
            <script type='text/javascript'>
                alert('Data Berhasil di Tambahkan');
                document.location.href = 'index.php';
            </script>
        ";
    } else {
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

<?php include '../../layouts/sidebar.php'; ?>
<h2>Data Barang </h2> <br>
<button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
    Tambah Barang
</button>

<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Barang</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body ">
            <form action="" method="post">
                <label for="" class="col-form-label">Nama Barang</label>
                <input type="text" class="form-control" name="nama_barang" required> <br>

                <label for="" class="col-form-label">Harga</label>
                <input type="text" class="form-control" name="harga" required> <br>

                <label for="" class="col-form-label">Stok</label>
                <input type="text" class="form-control" name="stok" required> <br>

                <input type="hidden" class="form-control" name="kode_barang"> <br>

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
    $barang = query("SELECT * FROM barang WHERE nama_barang LIKE '%".$cari."%'");
}
?>

<?php
    if (isset ($_GET['cariJadwal'])) {
        $cari = $_GET['cariJadwal'];
        // jika sama dengan pencarian
        $barang = mysqli_query($host, "SELECT * FROM barang WHERE nama_barang LIKE '%".$cari."%'");
    } else {
        // jika beda, tampilkan semua barang
        $barang = mysqli_query($host, "SELECT * FROM barang");
    }
    ;
?>

<table class="table table-striped">
    <tr>
        <th>No</th>
        <th>Nama Barang</th>
        <th>Harga</th>
        <th>Stok</th>
        <th>Kode Barang</th>
        <th>Action</th>
    </tr>

    <?php $i = 1; ?>
    <?php foreach($barang as $data) : ?>
        <tr>
            <td><?= $i++; ?></td>
            <td><?= $data["nama_barang"]; ?></td>
            <td>Rp.<?= number_format($data["harga"]); ?></td>
            <td><?= $data["stok"]; ?></td>
            <td><?= $data["kode_barang"]; ?></td>
            <td>
                <a href="edit.php?id_barang=<?= $data["id_barang"]; ?>" class="btn btn-success">Edit</a>
                <a href="hapus.php?id_barang=<?= $data["id_barang"]; ?>" class="btn btn-danger" onClick="return confirm('Anda yakin ingin menghapus data ini?')">Hapus</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<?php include '../../layouts/footer.php'; ?>