<?php 
require 'function.php';

if(!isset($_SESSION["username"])) {
    echo "
        <script type='text/javascript'>
            alert('Anda Harus Login Terlebih Dahulu');
            document.location.href = '../../auth/login/index.php';
        </script>
    ";
}

if(isset($_POST["add"])) {
    if(add($_POST) > 0) {
        echo "
            <script type='text/javascript'>
                alert('Data Berhasil di Tambahkan');
                document.location.href = 'index.php';
            </script>
        ";
    } else {
        echo "
            <script type='text/javascript'>
                alert('Data Gagal di Tambahkan BAKAAAAA!!!');
                document.location.href = 'index.php';
            </script>
        ";
    }
}

if(isset($_POST["confirm"])) {
    if(confirm($_POST) > 0) {
        echo "
            <script type='text/javascript'>
                alert('Data Berhasil di Konfirmasi');
                document.location.href = 'index.php';
            </script>
        // ";
    } else {
        echo "
            <script type='text/javascript'>
                alert('Data Gagal di Konfirmasi BAKAAAAA!!!');
                document.location.href = 'index.php';
            </script>
        ";
    }
}

// $data_barang = query("SELECT * FROM data_barang
// INNER JOIN lokasi ON data_barang.lokasi = lokasi.id_lokasi
// INNER JOIN barang ON data_barang.nama_Barang = barang.id_barang
// INNER JOIN size ON data_barang.size = size.id_size");

$data_gudang = query("SELECT * FROM data_barang");
$lokasi = query("SELECT * FROM lokasi");
$size = query("SELECT * FROM size");
$barang = query("SELECT * FROM barang");

?>

<head>
<title>Gudang Hengky</title>
<link rel="shortcut icon" href="../../layouts/favicon.ico" type="image/x-icon">
</head>

<?php include '../../layouts/sidebar.php' ?>

<h2>Data Gudang </h2> <br>

<button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
    Tambah Data Gudang
</button>

<button type="button" class="btn btn-success mb-3" value="Export Excel" onclick=" window.location.href = 'index2.php' "> Excel <i class="bi bi-download"></i> </button>

<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Gudang</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body ">
            <form action="" method="post">
                <label for="" class="col-form-label">Tanggal</label>
                <input type="date" class="form-control" name="tanggal" required>

                <label for="" class="col-form-label">Lokasi</label>
                <select name="lokasi" id="lokasi" class="form-control" required>
                    <option value="">...</option>
                    <?php foreach($lokasi as $data) : ?>
                        <option value="<?= $data['id_lokasi']; ?>"><?= $data['Kota']; ?></option>
                    <?php endforeach; ?>
                </select>

                <label for="" class="col-form-label">Nama Barang</label>
                <select name="nama_Barang" id="nama_Barang" class="form-control" required>
                    <option value="">...</option>
                    <?php foreach($barang as $data) : ?>
                        <option value="<?= $data['id_barang']; ?>"><?= $data['nama_barang']; ?></option>
                    <?php endforeach; ?>
                </select>

                <label for="" class="col-form-label">Satuan</label>
                <select name="satuan" id="satuan" class="form-control" required>
                    <option value="">...</option>
                    <option value="DUS">DUS</option>
                    <option value="PCS">PCS</option>
                </select>

                <label for="" class="col-form-label">Size</label>
                <select name="size" id="size" class="form-control" required>
                    <option value="">...</option>
                    <?php foreach($size as $data ) : ?>
                        <option value=" <?= $data['id_size']; ?>"><?= $data['size']; ?></option>
                    <?php endforeach; ?>
                </select>

                <label for="" class="col-form-label">Jumlah</label>
                <input type="text" class="form-control" name="jumlah" required> <br>

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
}
?>

<?php
    if (isset ($_GET['cariJadwal'])) {
        $cari = $_GET['cariJadwal'];
        // jika sama dengan pencarian
        $data_barang = mysqli_query($host, "SELECT * FROM data_barang
        INNER JOIN lokasi ON data_barang.lokasi = lokasi.id_lokasi
        INNER JOIN barang ON data_barang.nama_Barang = barang.id_barang
        INNER JOIN size ON data_barang.size = size.id_size WHERE barang.nama_barang LIKE '%".$cari."%'");
    } else {
        // jika beda, tampilkan semua barang
        $data_barang = mysqli_query($host, "SELECT * FROM data_barang
        INNER JOIN lokasi ON data_barang.lokasi = lokasi.id_lokasi
        INNER JOIN barang ON data_barang.nama_Barang = barang.id_barang
        INNER JOIN size ON data_barang.size = size.id_size");       
    }
    ;
?>

<table class="table table-striped">
    <tr>
        <th>No</th>
        <th>Tanggal</th>
        <th>Lokasi</th>
        <th>Kode Barang</th>
        <th>Nama Barang</th>
        <th>Satuan</th>
        <th>Size</th>
        <th>Jumlah</th>
        <th>Action</th>
    </tr>

    <form action="" method="post">
        <?php $i = 1; ?>
        <?php foreach($data_barang as $data) : ?>
            
            <tr>
                <td><?= $i++; ?></td>
                <td><?= $data["tanggal"]; ?>"</td>
                <td><?= $data["Kota"]; ?></td>
                <td><?= $data["kode_barang"]; ?></td>
                <td><?= $data["nama_barang"]; ?></td>
                <td><?= $data["satuan"]; ?></td>
                <td><?= $data["size"]; ?></td>
                <td><?= $data["jumlah"]; ?> | <?= $data["stok"]; ?></td>
                <td>
                    <a href="edit.php?id_data=<?= $data["id_data"]; ?>" class="btn btn-success">Edit</a>
                    <a href="hapus.php?id_data=<?= $data["id_data"]; ?>" class="btn btn-danger" onClick="return confirm('Anda yakin ingin menghapus data ini?')">Hapus</a>
                    <input type="submit" name="confirm" value="Confirm" class="btn btn-warning">
            </td>
        </tr>
        <?php endforeach; ?>
    </form>
</table>

<?php include '../../layouts/footer.php' ?>