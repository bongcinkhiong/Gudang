<?php 
session_start();

require '../../connect.php';

function query($query){
    global $host;
    $result = mysqli_query($host, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function add($data){
    global $host;

    $tanggal = htmlspecialchars($data['tanggal']);
    $lokasi = htmlspecialchars($data['lokasi']);
    $nama_barang = htmlspecialchars($data['nama_Barang']);
    $satuan = htmlspecialchars($data['satuan']);
    $size = htmlspecialchars($data['size']);
    $jumlah = htmlspecialchars($data['jumlah']);

    $query = mysqli_query( $host, "INSERT INTO data_barang VALUES (NULL, '$tanggal', '$lokasi','$nama_barang', '$satuan', '$size' , '$jumlah')");

    return mysqli_affected_rows($host); 
}

function edit($data){
    global $host;

    $id_data = $data['id_data'];
    $tanggal = htmlspecialchars($data['tanggal']);
    $lokasi = htmlspecialchars($data['lokasi']);
    $nama_barang = htmlspecialchars($data['nama_Barang']);
    $satuan = htmlspecialchars($data['satuan']);
    $size = htmlspecialchars($data['size']);
    $jumlah = htmlspecialchars($data['jumlah']);

    $query = mysqli_query($host ," UPDATE data_barang SET 
    tanggal = '$tanggal', 
    lokasi = '$lokasi', 
    nama_Barang = '$nama_barang', 
    satuan = '$satuan', 
    size = '$size', 
    jumlah = '$jumlah' WHERE id_data = $id_data " );

    return mysqli_affected_rows($host);
}

function confirm($data){
    global $host;

    // $nama_barang = $data['nama_barang'];
    // $tanggal = $data['tanggal'];
    // $lokasi = $data['lokasi'];
    // $satuan = $data['satuan'];
    // $size = $data['size'];
    // $jumlah = $data['jumlah'];
    // $status = 'Proses';
    // $id_data_barang = $data['id_data_barang'];

    // $queryConfirm = "INSERT INTO konfirmasi VALUES ( NULL, '$nama_barang', '$tanggal', '$lokasi', '$satuan', '$size', '$jumlah', '$status', '$id_data_barang')";

    // mysqli_query($host, $queryConfirm);

    foreach($_SESSION['conf'] as $id_barang => $kuantitas) : ?>
    <?php $barang = query("SELECT * FROM barang INNER JOIN data_barang ON data_barang.nama_Barang = barang.id_barang WHERE id_data = '$id_barang' ")[0];
    $totalHarga = $data['harga'] * $kuantitas;

    $lokasi = $data['lokasi'];
    $size = $data['size'];
    $jumlah = $kuantitas;
    $status = 'Proses';
    $sisaStok = $barang['stok'] - $kuantitas;
    $id_data_barang = $data['id_data_barang'];
    $totalHarga = $totalHarga;

    $queryConfirm = "INSERT INTO konfirmasi VALUES ( NULL, '$lokasi', '$size', '$jumlah', '$status', '$sisaStok', '$id_data_barang' , '$totalHarga')";
    mysqli_query($host, $queryConfirm);

    if($queryConfirm){
        mysqli_query($host , "UPDATE barang SET stok = '$sisaStok' WHERE id_barang = '$id_barang'");
    }

    endforeach;
    unset($_SESSION['confirm']);
    return true;
}
?>