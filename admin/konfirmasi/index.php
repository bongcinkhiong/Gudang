<?php 
require 'function.php';

if (!isset($_SESSION["username"])) {
    echo "
        <script>
            alert('Silahkan Login Terlebih Dahulu');
            document.location.href = '../../auth/login/index.php';
        </script>
    ";
}

$konfirmasi = query("SELECT * FROM konfirmasi
INNER JOIN data_barang ON konfirmasi.id_data_barang = data_barang.id_data
INNER JOIN lokasi ON konfirmasi.lokasi = lokasi.id_lokasi
INNER JOIN size ON konfirmasi.size = size.id_size
INNER JOIN barang ON konfirmasi.id_data_barang = barang.id_barang");
?>

<head>
<title>Gudang Hengky</title>
<link rel="shortcut icon" href="../../layouts/favicon.ico" type="image/x-icon">
</head>

<?php include '../../layouts/sidebar.php' ?>

<h1>Data Konfirmasi</h1>

<table class="table table-striped">
    <tr>
        <th>No</th>
        <th>Nama Barang</th>
        <th>Tanggal</th>
        <th>Lokasi</th>
        <th>Satuan</th>
        <th>Size</th>
        <th>Jumlah</th>
        <th>Harga</th>
        <th>Total Harga</th>
        <th>Status</th>
    </tr>

        <?php $i = 1; ?>
        <?php foreach ($konfirmasi as $data) : ?>
            <tr>
                <td><?= $i; ?></td>
                <td><?= $data["nama_barang"]; ?></td>
                <td><?= $data["tanggal"]; ?></td>
                <td><?= $data["lokasi"]; ?></td>
                <td><?= $data["satuan"]; ?></td>
                <td><?= $data["size"]; ?></td>
                <td><?= $data["jumlah"]; ?></td>
                <td><?= $data["harga"]; ?></td>
                <td><?= $data["total_harga"]; ?></td>
                <td><?= $data["status"]; ?></td>
                <td>
                    <?php if ($data["status"] > 0) { ?>
                        <a href="update_terima.php?id_confirm=<?= $data["id_confirm"]; ?>" class="btn btn-success">Terima</a>
            <?php } else { ?>
                <?php } ?>
                
                <?php if ($data["status"] > 0) { ?>
                    <a href="update_tolak.php?id_confirm=<?= $data["id_confirm"]; ?>" class="btn btn-danger">Tolak</a>
                    <?php } else { ?>
                        <?php } ?>
                    </td>
                </tr>
                <?php $i++; ?>
                <?php endforeach; ?>
</table>
<?php include '../../layouts/footer.php' ?>