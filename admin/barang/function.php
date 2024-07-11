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

    $nama_barang = htmlspecialchars($data['nama_barang']);
    $harga = htmlspecialchars($data['harga']);
    $stok = htmlspecialchars($data['stok']);
    $kode_barang = bin2hex(random_bytes(5));

    $query = mysqli_query( $host, "INSERT INTO barang VALUES (null, '$nama_barang', '$harga', '$stok' , '$kode_barang')");

    return mysqli_affected_rows($host);
}

function edit($data){
    global $host;

    $id_barang = $data['id_barang'];
    $nama_barang = htmlspecialchars($data['nama_barang']);
    $harga = htmlspecialchars($data['harga']);
    $stok = htmlspecialchars($data['stok']);

    $query = mysqli_query( $host, "UPDATE barang SET nama_barang = '$nama_barang', harga = '$harga', stok = '$stok' WHERE id_barang = $id_barang");

    return mysqli_affected_rows($host);
}

?>