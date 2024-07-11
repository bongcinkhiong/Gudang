<?php 
require 'function.php';

$data_barang = query("SELECT * FROM data_barang
INNER JOIN lokasi ON data_barang.lokasi = lokasi.id_lokasi
INNER JOIN barang ON data_barang.nama_Barang = barang.id_barang
INNER JOIN size ON data_barang.size = size.id_size
"); 

$data_gudang = query("SELECT * FROM data_barang");
$lokasi = query("SELECT * FROM lokasi");
$size = query("SELECT * FROM size");
$barang = query("SELECT * FROM barang");


header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Data-Gudang.xls");
?>

<center>
    <h1>Data Gudang</h1>
</center>

<table border="1" align="center">
    <tr>
        <th>No</th>
        <th>Tanggal</th>
        <th>Lokasi</th>
        <th>Kode Barang</th>
        <th>Nama Barang</th>
        <th>Satuan</th>
        <th>Size</th>
        <th>Jumlah</th>
    </tr>

    <?php $i = 1; ?>
    <?php foreach($data_barang as $data) : ?>
        <tr>
            <td><?= $i++; ?></td>
            <td><?= $data["tanggal"]; ?></td>
            <td><?= $data["Kota"]; ?></td>
            <td><?= $data["kode_barang"]; ?></td>
            <td><?= $data["nama_barang"]; ?></td>
            <td><?= $data["satuan"]; ?></td>
            <td><?= $data["size"]; ?></td>
            <td><?= $data["jumlah"]; ?> | <?= $data["stok"]; ?></td>
        </tr>
    <?php endforeach; ?>
</table>
